<?php

class model_admincustomerslogo extends model
{
    function getCustomersLogo()
    {
        $sql = 'select * from tbl_customers_logo order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function deleteLogo($logo_id)
    {
        $sql = 'delete from tbl_customers_logo where id=?';
        $status = $this->doQuery($sql, [$logo_id]);
        unlink("public/images/customers_logo/".$logo_id.'.png');
        if ($status == "true") {
            $url=URL.'admincustomerslogo';
            echo'<script>location.href ="'.$url.'";</script>';

        } else {
            echo 'خطا,لطفا دوباره امتحان کنید';
        }
    }

    function addLogo($data, $file)
    {
        $title = $this->ClearInput($data['title']);


        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/customers_logo/';

        $date=parent::jaliliDate('Y/n/j');

        $sql = 'insert into tbl_customers_logo (title,created_at) values (?,?)';
        $params = [$title,$date];
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
                $target = $targetMain . $newName . '.' . 'png';

                move_uploaded_file($fileTmp, $target);
                $target300 = $targetMain . $newName . '.' . 'png';
                $this->create_thumbnail($target, $target300, 250, 250);



            }

            $url=URL.'admincustomerslogo';
            echo'<script>location.href ="'.$url.'";</script>';
        }
    }
}

?>