<?php

class  model_adminfooter extends model
{
    function footerInfo()
    {
        $sql = 'select * from tbl_footer_info';
        $result = $this->doSelect($sql, [], 1);
        return $result;
    }

    function editFooter($data, $footer_id)
    {
        $description = $this->ClearInput($data['description']);
        $email = $this->ClearInput($data['email']);
        $address = $this->ClearInput($data['address']);
        $phone = $this->ClearInput($data['phone']);
        $instagram = $this->ClearInput($data['instagram']);
        $telegram = $this->ClearInput($data['telegram']);
        $twitter= $this->ClearInput($data['twitter']);
        $youtube= $this->ClearInput($data['youtube']);

        $sql = 'update tbl_footer_info set description=?,email=?,address=?,phone=?,youtube=?,telegram=?,instagram=?,twitter=? where id=?';
        $params = [$description, $email, $address, $phone,$youtube,$telegram,$instagram,$twitter, $footer_id];
        $status = $this->doQuery($sql, $params);
        if ($status == 'true') {

            $url = URL . 'adminfooter?success';
            echo '<script>location.href ="' . $url . '";</script>';

        }

    }

    function personnelInfo()
    {
        $sql = 'select * from tbl_personnel order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }


    function personnelInfo2($personnel_id)
    {
        $sql = 'select * from tbl_personnel where id=?';
        $result = $this->doSelect($sql, [$personnel_id], 1);
        return $result;
    }

    function addPersonnel($data, $file)
    {


        $name = $this->ClearInput($data['name']);
        $side = $this->ClearInput($data['side']);
        $description = $this->ClearInput($data['description']);
        $date_joine = $this->ClearInput($data['date_joine']);

        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/personnel/';


        $sql = 'insert into tbl_personnel (name,side,description,date_joine) values (?,?,?,?)';
        $params = [$name, $side, $description, $date_joine];
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
                $this->create_thumbnail($target, $target300, 500, 500);
                unlink("public/images/personnel/" . $last_id . '.png');


            }
            $url = URL . 'adminfooter/personnel?addPersonnel';
            echo '<script>location.href ="' . $url . '";</script>';

        }
    }


    function deletePersonnel($personnel_id)
    {
        $sql = 'delete from tbl_personnel where id=?';
        $status = $this->doQuery($sql, [$personnel_id]);
        unlink("public/images/personnel/" . $personnel_id . '.jpg');
        if ($status == "true") {
            $url = URL . 'adminfooter/personnel';
            echo '<script>location.href ="' . $url . '";</script>';
        } else {
            echo 'خطا,لطفا دوباره امتحان کنید';
        }
    }


    function editPersonnel($data, $file, $personnel_id)
    {

        $name = $this->ClearInput($data['name']);
        $side = $this->ClearInput($data['side']);
        $description = $this->ClearInput($data['description']);
        $date_joine = $this->ClearInput($data['date_joine']);


        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/personnel/';


        $sql = 'update tbl_personnel set name=?,side=?,description=?,date_joine=? where id=?';
        $params = [$name, $side, $description, $date_joine, $personnel_id];
        $status = $this->doQuery($sql, $params);

        if ($status == true) {

            $newName = $personnel_id;

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


                $this->create_thumbnail($target, $target300, 500, 500);

            }
        }
        $url = URL . 'adminfooter/editpersonnel/' . $personnel_id . '?editPersonnel';
        echo '<script>location.href ="' . $url . '";</script>';

    }

    function honorsInfo()
    {
        $sql = 'select * from tbl_honors order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function honorsInfo2($honors_id)
    {
        $sql = 'select * from tbl_honors where id=?';
        $result = $this->doSelect($sql, [$honors_id], 1);
        return $result;
    }


    function addhonors($data, $file)
    {


        $title = $this->ClearInput($data['title']);
        $date_received = $this->ClearInput($data['date_received']);
        $description = $this->ClearInput($data['description']);


        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/honors/';


        $sql = 'insert into tbl_honors (title,date_received,description) values (?,?,?)';
        $params = [$title, $date_received, $description];
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
                $this->create_thumbnail($target, $target300, 250, 250);
                unlink("public/images/honors/" . $last_id . '.png');


            }

            $url = URL . 'adminfooter/honors?addHonors';
            echo '<script>location.href ="' . $url . '";</script>';
        }
    }


    function deleteHonors($honors_id)
    {
        $sql = 'delete from tbl_honors where id=?';
        $status = $this->doQuery($sql, [$honors_id]);
        unlink("public/images/honors/" . $honors_id . '.jpg');
        if ($status == "true") {
            $url = URL . 'adminfooter/honors';
            echo '<script>location.href ="' . $url . '";</script>';
        } else {
            echo 'خطا,لطفا دوباره امتحان کنید';
        }
    }

    function editHonors($data, $file, $honors_id)
    {


        $title = $this->ClearInput($data['title']);
        $date_received = $this->ClearInput($data['date_received']);
        $description = $this->ClearInput($data['description']);


        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/honors/';


        $sql = 'update tbl_honors set title=?,date_received=?,description=? where id=?';
        $params = [$title, $date_received, $description, $honors_id];
        $status = $this->doQuery($sql, $params);

        if ($status == true) {

            $newName = $honors_id;

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


                $this->create_thumbnail($target, $target300, 250, 250);

            }
        }
        $url = URL . 'adminfooter/edithonors/' . $honors_id . '?editHonors';
        echo '<script>location.href ="' . $url . '";</script>';
    }
}

?>