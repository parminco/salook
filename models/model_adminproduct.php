<?php

class  model_adminproduct extends model
{

    function getProducts()
    {
        $sql = 'select tbl_product.*,tbl_category.title as categoryTitle
        from tbl_product
        left join tbl_category on tbl_product.category=tbl_category.id
        where tbl_product.deleted_at=?
        order by tbl_product.id desc';
        $result = $this->doSelect($sql, ['']);
        return $result;
    }

    function getProductInfo($product_id)
    {
        $sql = 'select tbl_product.*,tbl_category.title as categoryTitle
        from tbl_product
        left join tbl_category on tbl_product.category=tbl_category.id
        where tbl_product.deleted_at=? and tbl_product.id=?
        order by tbl_product.id desc';
        $result = $this->doSelect($sql, ['', $product_id], 1);
        return $result;
    }

    function getCategory()
    {
        $sql = 'select * from tbl_category order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getLocation()
    {
        $sql = 'select * from tbl_location where parent!=0 order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function deleteProduct($product_id)
    {
        $date = parent::jaliliDate('Y/n/j');
        $sql = 'update tbl_product set deleted_at=? where id=?';
        $this->doQuery($sql, [$date, $product_id]);
        $url = URL . 'adminproduct/?deleted_at=true';
        echo '<script>location.href ="' . $url . '";</script>';

    }

    function addProduct($data, $file)
    {
        $title = $this->ClearInput($data['title']);
        $price = abs($this->ClearInput($data['price']));
        $discount = abs($this->ClearInput($data['discount']));
        $introduction = $this->ClearScreenText($data['introduction']);
        $category = $this->ClearInput($data['category']);
        $location = $this->ClearInput($data['location']);
        $date = self::jaliliDate('Y/n/j');


        $sql = 'insert into tbl_product(title,price,discount,introduction,category,location,status,created_at)values(?,?,?,?,?,?,?,?)';


        $value = [$title, $price, $discount, $introduction, $category,$location, '0', $date];
        $this->doQuery($sql, $value);

        $productId = parent::$conn->lastInsertId();
        mkdir('public/images/product/' . $productId);
        mkdir('public/images/product/' . $productId . '/gallery');

        $file = $file['image'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/product/' . $productId . '/';
        $newName = 'large';

        if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png' and $fileType != 'image/gif') {
            $uploadOk = 0;
        }
        if ($fileSize > 2542880) {
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . $newName . '.' . 'jpg';

            move_uploaded_file($fileTmp, $target);

            $target200 = $targetMain . 'small' . '.' . 'jpg';
            $target400 = $targetMain . 'large' . '.' . 'jpg';

            $this->create_thumbnail($target, $target200, 250, 150);
            $this->create_thumbnail($target, $target400, 500, 300);
        }
        $url = URL . 'adminproduct/addproductfile/' . $productId;
        echo '<script>location.href ="' . $url . '";</script>';
    }

    function addProductFile($data, $file, $product_id)
    {
        $type = $data['type'];

        $file = $file['file'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/file/';

        $newName = 'File_' . time() . '_' . rand(1000, 9999);

        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileType != 'pdf' and $fileType != 'doc' and $fileType != 'docx' and $fileType != 'zip') {
            $uploadOk = 0;
        }
        if ($fileSize > 10502569) {
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . $newName . '.' . $ext;

            move_uploaded_file($fileTmp, $target);
            $file_name = $newName . '.' . $ext;
            $sql = 'update tbl_product set type=?,file_name=? where id=?';
            $this->doQuery($sql, [$type, $file_name, $product_id]);
            $url = URL . 'adminproduct/addproductgallery/' . $product_id;
            echo '<script>location.href ="' . $url . '";</script>';

        }
    }

    function getGallery($product_id)
    {
        $sql = 'select * from tbl_gallery where idproduct=? order by id desc';
        $params = [$product_id];
        $result = $this->doSelect($sql, $params);
        return $result;
    }

    function addProductGallery($file, $product_id)
    {

        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/product/' . $product_id . '/gallery/';

        $newName = 'image_' . time() . '_' . rand(1000, 9999);

        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileType != 'jpg' and $fileType != 'jpeg' and $fileType != 'png' and $fileType != 'gif') {
            $uploadOk = 0;
            header('location:' . URL . 'adminproduct/addproductgallery/' . $product_id . '?errorUploadType');
        }

        if ($fileSize > 2502569) {
            $uploadOk = 0;
            header('location:' . URL . 'adminproduct/addproductgallery/' . $product_id . '?errorUploadSize');
        }
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . $newName . '.' . $ext;
            move_uploaded_file($fileTmp, $target);
            $this->create_thumbnail($target, $target, 500, 300);

            $file_name = $newName . '.' . $ext;
            $sql = 'insert into  tbl_gallery (img,idproduct) values(?,?)';
            $this->doQuery($sql, [$file_name, $product_id]);

            $url = URL . 'adminproduct/addproductgallery/' . $product_id;
            echo '<script>location.href ="' . $url . '";</script>';

        }
    }

    function deleteProductGallery($product_id, $img_name)
    {
        $sql = 'delete from tbl_gallery where img=? and idproduct=?';
        $this->doQuery($sql, [$img_name, $product_id]);
        unlink('public/images/product/' . $product_id . '/gallery/' . $img_name);

        $url = URL . 'adminproduct/addproductgallery/' . $product_id;
        echo '<script>location.href ="' . $url . '";</script>';


    }

    function getProductDescription($product_id)
    {
        $sql = 'select * from tbl_product_description where product_id=? order by id desc';
        $params = [$product_id];
        $result = $this->doSelect($sql, $params);
        return $result;
    }

    function addProductDescription($data, $product_id)
    {
        $title = $this->ClearInput($data['title']);
        $description = $this->ClearInput($data['description']);


        $sql = 'insert into tbl_product_description(title,description,product_id)values(?,?,?)';
        $params = [$title, $description, $product_id];
        $this->doQuery($sql, $params);

        $url = URL . 'adminproduct/addproductdescription/' . $product_id;
        echo '<script>location.href ="' . $url . '";</script>';


    }

    function deleteProductDescription($product_id)
    {
        $sql = 'delete from tbl_product_description where product_id=?';
        $this->doQuery($sql, [$product_id]);
        $url = URL . 'adminproduct/addproductdescription/' . $product_id;
        echo '<script>location.href ="' . $url . '";</script>';


    }


    function editProduct($data, $file, $product_id)
    {
        $title = $this->ClearInput($data['title']);
        $price = abs($this->ClearInput($data['price']));
        $discount = abs($this->ClearInput($data['discount']));
        $introduction = $this->ClearScreenText($data['introduction']);
        $category = $this->ClearInput($data['category']);
        $date = self::jaliliDate('Y/n/j');


        $sql = 'update tbl_product set title=?,price=?,discount=?,introduction=?,category=?,updated_at=? where id=?';


        $value = [$title, $price, $discount, $introduction, $category, $date, $product_id];
        $this->doQuery($sql, $value);


        $file = $file['image'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/product/' . $product_id . '/';
        $newName = 'large';

        if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png' and $fileType != 'image/gif') {
            $uploadOk = 0;
        }
        if ($fileSize > 2542880) {
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . $newName . '.' . 'jpg';

            move_uploaded_file($fileTmp, $target);

            $target200 = $targetMain . 'small' . '.' . 'jpg';
            $target400 = $targetMain . 'large' . '.' . 'jpg';

            $this->create_thumbnail($target, $target200, 250, 150);
            $this->create_thumbnail($target, $target400, 500, 300);
        }


        $url = URL . 'adminproduct/?updated_at=true';
        echo '<script>location.href ="' . $url . '";</script>';

    }

    function addDiscountCode($data)
    {
        $name = $this->ClearInput($data['name']);
        $percent = abs($this->ClearInput($data['percent']));
        $credit_time = abs($this->ClearInput($data['credit_time']));
        $date = parent::jaliliDate('Y/n/j');


        $monthToDay = $credit_time * 30;
        $expire_time = time() + ($monthToDay * 24 * 60 * 60);

        $sql = 'select * from tbl_code_discount where name =?';
        $result = $this->doSelect($sql, [$name]);
        if (sizeof($result) == 1) {
            $url = URL . 'adminproduct/adddiscountcode?usedCode';
            echo '<script>location.href ="' . $url . '";</script>';
        } else {

            $sql = 'insert into tbl_code_discount (name,percent,created_at,expire_time)values (?,?,?,?)';
            $this->doQuery($sql, [$name, $percent, $date, $expire_time]);
            $url = URL . 'adminproduct/adddiscountcode?success';
            echo '<script>location.href ="' . $url . '";</script>';
        }



    }


}

?>
