<?php

class model_profile extends model
{
    private $userId;

    function getUserInfo()
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $sql = 'select * from tbl_user where id=?';
        $result = $this->doSelect($sql, [$userId], 1);
        return $result;
    }

    function getUserTariffs()
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $sql = 'select * from tbl_tariffs_user where user_id=? and active_tariffs=1';
        $result = $this->doSelect($sql, [$userId], 1);


        if (is_array($result)) {
            //credit days
            $Real_Time = date('Y-m-d', time());
            $Expire_Time = date('Y-m-d', $result['expire_time']);
            $Real_Time = date_create($Real_Time);
            $Expire_Time = date_create($Expire_Time);
            $credit_days = date_diff($Real_Time, $Expire_Time);
            //$credit_days=$credit_days->format("%R%a days");//org format
            $credit_days = $credit_days->format("%a");
            //end credit days

            $result['credit_days'] = $credit_days;
            return $result;
        }
    }

    function getOrders()
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $sql = 'select * from tbl_order_product where user_id=? order by id desc ';
        $result = $this->doSelect($sql, [$userId]);
        return $result;
    }

    function getOrderInfo($orderKey)
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $sql = 'select * from tbl_order_product where user_id=? and order_code=?';
        $params = [$userId, $orderKey];
        $result = $this->doSelect($sql, $params, 1);
        return $result;
    }

    function getAds()
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $sql = 'select * from tbl_ads where user_id=? order by id desc';
        $params = [$userId];
        $result = $this->doSelect($sql, $params);
        return $result;
    }

    function getAdsInfo($ads_id)
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $sql = 'select * from tbl_ads where user_id=? and id =?';
        $params = [$userId, $ads_id];
        $result = $this->doSelect($sql, $params, 1);
        return $result;
    }

    function remove_ads($ads_id)
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $sql = 'delete  from tbl_ads where id=? and user_id=?';
        $params = [$ads_id, $userId];
        $status = $this->doQuery($sql, $params);
        unlink("public/images/ads/" . $ads_id . '.jpg');
        if ($status == true) {

            $url = URL . 'profile/ads';
            echo '<script>location.href ="' . $url . '";</script>';

        } else {
            echo 'خطایی رخ داده لطفا دوباره امتحان کنید';
        }
    }

    function ads_edit($data, $file, $ads_id)
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $title = $this->ClearInput($data['title']);
        $description = $this->ClearScreenText($data['description']);
        $type = $data['type'];

        if ($title == '' or $description == '') {

            $url = URL . 'profile/ads_edit?empty';
            echo '<script>location.href ="' . $url . '";</script>';
        } else {

            $file = $file['image'];

            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileTmp = $file['tmp_name'];
            $fileType = $file['type'];
            $fileError = $file['error'];
            $uploadOk = 1;
            $targetMain = 'public/images/ads/';

            $date = $date = self::jaliliDate('Y/n/j');

            $sql = 'update tbl_ads set title=?,description=?,status=?,type=?,updated_at=? where id=? and user_id=?';
            $params = [$title, $description, '0', $type, $date, $ads_id, $userId];
            $status = $this->doQuery($sql, $params);

            if ($status == true) {

                $newName = $ads_id;

                if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png') {
                    $uploadOk = 0;
                }
                if ($fileSize > 2502569) {
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    $target = $targetMain . $newName . '.' . 'jpg';

                    move_uploaded_file($fileTmp, $target);
                    $target300 = $targetMain . $newName . '.' . 'jpg';
                    $this->create_thumbnail($target, $target300, 300, 300);

                }
            }
        }
    }

    function check_limit_ads()
    {

        $userTariffs = $this->getUserTariffs();
        $adsUsed = $userTariffs['ads_used'];
        $tariffsId = $userTariffs['tariffs_id'];

        $sql = 'select * from tbl_tariffs where id=? and deleted_at=?';
        $tariffsInfo = $this->doSelect($sql, [$tariffsId, ''], 1);
        $limitAds = $tariffsInfo['limit_ads'];

        if ($limitAds > $adsUsed) {
            return 'true';
        } else {
            return 'false';
        }

//        echo '<br>'.'limit_ads='.$limitAds.' and '.'ads_used='.$adsUsed;

    }

    function add_ads($data, $file)
    {

        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $title = $this->ClearInput($data['title']);
        $tonnage = $this->ClearInput($data['tonnage']);
        $price = $this->ClearInput($data['price']);
        $description = $this->ClearScreenText($data['description']);
        $type = $data['type'];

        if ($title == '' or $description == '') {
            $url = URL . 'profile/add_ads?empty';
            echo '<script>location.href ="' . $url . '";</script>';

        } else {

            $file = $file['image'];

            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileTmp = $file['tmp_name'];
            $fileType = $file['type'];
            $fileError = $file['error'];
            $uploadOk = 1;
            $targetMain = 'public/images/ads/';

            $date = $date = self::jaliliDate('Y/n/j');

            //update used ads
            $userTariffs = $this->getUserTariffs();
            $userTariffsId = $userTariffs['id'];
            $sql = 'update tbl_tariffs_user set ads_used=ads_used+1 where id=?';
            $this->doQuery($sql, [$userTariffsId]);
            //end update used ads

            $sql = 'insert into tbl_ads (title,description,status,type,price,tonnage,user_id,created_at) values (?,?,?,?,?,?,?,?)';
            $params = [$title, $description, '0', $type,$price,$tonnage, $userId, $date];
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
                    $target = $targetMain . $newName . '.' . 'jpg';

                    move_uploaded_file($fileTmp, $target);
                    $target300 = $targetMain . $newName . '.' . 'jpg';
                    $this->create_thumbnail($target, $target300, 300, 300);

                }
                $url = URL . 'profile/ads';
                echo '<script>location.href ="' . $url . '";</script>';
            }
        }
    }

    function resetPassword($data)
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $oldPassword = $this->ClearInput($data['oldPassword']);
        $newPassword = $this->ClearInput($data['newPassword']);
        $confirmPassword = $this->ClearInput($data['confirmPassword']);


        $userInfo = $this->getUserInfo();
        $password = $userInfo['password'];
        $error = '';

        if (!empty($oldPassword) and !empty($newPassword) and !empty($confirmPassword)) {

            if (strlen($newPassword) > 8 and strlen($newPassword) < 32) {
                if ($password == $oldPassword) {
                    if ($newPassword == $confirmPassword) {
                        $sql = 'update tbl_user set password=? where id=?';
                        $status = $this->doQuery($sql, [$newPassword, $userId]);
                        if ($status == 'true') {

                            $error = 'تغیر کلمه عبور با موفقیت انجام شد';
                        } else {
                            $error = 'خطایی در سمت سرور رخ داده است لطفا بعدا امتحان کنید';
                        }

                    } else {

                        $error = 'تکرار کلمه عبور نادرست است';
                    }
                } else {

                    $error = 'پسورد فعلی نادرست است';

                }
            } else {
                $error = 'پسورد باید بیشتر از 8 و کمتر از 32 کارکتر باشد';
            }
        } else {
            $error = 'لطفا اطلاعات را وارد کنید';
        }
        $url = URL . 'profile/resetpassword?error=' . $error;
        echo '<script>location.href ="' . $url . '";</script>';
    }

    function editProfile($data, $file)
    {
        $this->userId = model::sessionGet('user_id');
        $userId = $this->userId;
        $name = $this->ClearInput($data['name']);
        $email = $this->ClearInput($data['email']);
        $phone = $this->ClearInput($data['phone']);


        if ($email == '' or $phone == '') {
            $url = URL . 'profile/editprofile?empty';
            echo '<script>location.href ="' . $url . '";</script>';

        } else {

            $file = $file['image'];

            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileTmp = $file['tmp_name'];
            $fileType = $file['type'];
            $fileError = $file['error'];
            $uploadOk = 1;
            $targetMain = 'public/images/profile/';

            $date = $date = self::jaliliDate('Y/n/j');

            //update user profile

            $sql = 'update tbl_user set name=?,email=?,phone=? where id=?';
            $this->doQuery($sql, [$name, $email, $phone, $userId]);
            //end update


            $newName = $userId;

            if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png') {
                $uploadOk = 0;
            }
            if ($fileSize > 2502569) {
                $uploadOk = 0;
            }
            if ($uploadOk == 1) {
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                $target = $targetMain . $newName . '.' . 'jpg';

                move_uploaded_file($fileTmp, $target);
                $target300 = $targetMain . $newName . '.' . 'jpg';
                $this->create_thumbnail($target, $target300, 200, 200);

            }
            $url = URL . 'profile/editprofile';
            echo '<script>location.href ="' . $url . '";</script>';
        }
    }


    function checkProductLinkExpire($key)
    {
        $key = $this->ClearInput($key);
        if (!empty($key)) {
            $key = preg_replace('/[^a-zA-Z0-9]/', '', $key);
            $sql = "select * from tbl_product_link_expire inner join tbl_product on tbl_product_link_expire.product_id = tbl_product.id where tbl_product_link_expire.key =?";
            $result = $this->doSelect($sql, [$key], 1);
//            print_r($result);
            if (empty($result)) {
                echo 'لینک دانلود معتر نمی باشد';
            } else {
                $expire = $result['expire'];
                $filename = $result['file_name'];
                $filename = URL . 'public/file/' . $filename;
                echo '<br>' . $filename;
                $filename2 = pathinfo($filename);
                $name = $filename2['filename'];
                $ext = $filename2['extension'];
                $newfilename = md5($name) . '.' . $ext;
               ;
                echo '<br>' . $newfilename.'<br>';
                if ($expire < time()) {
//                    echo 'مهلت استفاده از این لینک به اتمام رسیده';
                } else {
                    ob_end_clean();
                    header('Content-Type: application/octet-stream');
                    header('Content-Length:' . filesize($filename));
                    header('Content-Disposition:attachment;filename=' . $newfilename);

                    $file = fopen($filename, 'r');
                    while (!feof($file)) {
                        echo fread($filename, 1024);
                    }
                }
            }
        } else {
            echo 'لینک دانلود معتر نمی باشد';
        }

    }


}

?>