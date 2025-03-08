<?php

class model_adminslider extends model
{
    function getSlider()
    {
        $sql = 'select * from tbl_slider order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getSlider2($slider_id)
    {
        $sql = 'select * from tbl_slider where id=?';
        $result = $this->doSelect($sql,[$slider_id],1);
        return $result;
    }

    function addSlider($data, $file)
    {
        $title = $this->ClearInput($data['title']);
        $link = $this->ClearInput($data['link']);

        $file = $file['image'];

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/slider/';


        $sql = 'insert into tbl_slider (title,link) values (?,?)';
        $params = [$title, $link];
        $status = $this->doQuery($sql, $params);

        if ($status == true) {
            $last_id = parent::$conn->lastInsertId();
            $newName = $last_id;

            if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png' ) {
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
                $this->create_thumbnail($target, $target300, 1500, 500);
                unlink("public/images/slider/".$last_id.'.png');


            }

            $url=URL.'adminslider';
            echo'<script>location.href ="'.$url.'";</script>';

        }

    }

    function deleteSlider($slider_id)
    {
        $sql = 'delete from tbl_slider where id=?';
        $status = $this->doQuery($sql, [$slider_id]);
        unlink("public/images/slider/".$slider_id.'.jpg');
        if ($status == "true") {
            $url=URL.'adminslider';
            echo'<script>location.href ="'.$url.'";</script>';

        } else {
            echo 'خطا,لطفا دوباره امتحان کنید';
        }
    }

    function editSlider($data, $file,$slider_id)
    {
        $title = $this->ClearInput($data['title']);
        $link = $this->ClearInput($data['link']);

            $file = $file['image'];

            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileTmp = $file['tmp_name'];
            $fileType = $file['type'];
            $fileError = $file['error'];
            $uploadOk = 1;
            $targetMain = 'public/images/slider/';


            $sql = 'update tbl_slider set title=?,link=? where id=?';
            $params = [$title,$link,$slider_id];
            $status = $this->doQuery($sql, $params);

            if ($status == true) {

                $newName = $slider_id;

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


                    $this->create_thumbnail($target, $target300, 1500, 500);

                }
            }
    }
}

?>