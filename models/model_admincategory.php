<?php

class model_admincategory extends model
{
    function getCategory(){
        $sql='select * from tbl_category order by id desc';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getCategory2($category_id)
    {
        $sql = 'select * from tbl_category where id=?';
        $result = $this->doSelect($sql,[$category_id],1);
        return $result;
    }


    function deleteCategory($category_id)
    {
        $sql = 'delete from tbl_category where id=?';
        $status = $this->doQuery($sql, [$category_id]);
        unlink("public/images/category/".$category_id.'.jpg');
        if ($status == "true") {

            $url=URL.'admincategory';
            echo'<script>location.href ="'.$url.'";</script>';

        } else {
            echo 'خطا,لطفا دوباره امتحان کنید';
        }
    }

    function addCategory($data, $file)
    {
        $title = $this->ClearInput($data['title']);


        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/category/';


        $sql = 'insert into tbl_category (title) values (?)';
        $params = [$title];
        $status = $this->doQuery($sql, $params);

        if ($status == true) {
            $last_id = parent::$conn->lastInsertId();
            $newName = $last_id;

            if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png') {
                $uploadOk = 0;
            }
            if ($fileSize > 2502569) {
                $uploadOk = 0;
            }
            if ($uploadOk == 1) {
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                $target = $targetMain . $newName . '.' . $ext;

                move_uploaded_file($fileTmp, $target);
                $target300 = $targetMain . $newName . '.' . 'jpg';
                $this->create_thumbnail($target, $target300, 400, 300);
                unlink("public/images/category/" . $last_id . '.png');


            }
            $url=URL.'admincategory';
            echo'<script>location.href ="'.$url.'";</script>';


        }
    }

        function editCategory($data, $file,$category_id)
        {
            $title = $this->ClearInput($data['title']);


            $file = $file['image'];

            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileTmp = $file['tmp_name'];
            $fileType = $file['type'];
            $fileError = $file['error'];
            $uploadOk = 1;
            $targetMain = 'public/images/category/';


            $sql = 'update tbl_category set title=? where id=?';
            $params = [$title, $category_id];
            $status = $this->doQuery($sql, $params);

            if ($status == true) {

                $newName = $category_id;

                if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png') {
                    $uploadOk = 0;
                }
                if ($fileSize > 2502569) {
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    $target = $targetMain . $newName . '.' . $ext;

                    move_uploaded_file($fileTmp, $target);
                    $target300 = $targetMain . $newName . '.' . 'jpg';


                    $this->create_thumbnail($target, $target300, 400, 300);

                }
            }

    }
}

?>