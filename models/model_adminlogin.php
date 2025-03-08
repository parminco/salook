<?php

class  model_adminlogin extends model
{
    function checkAdminLogin($data)
    {
        $email = $this->ClearInput($data['email']);
        $password = $this->ClearInput($data['password']);


        if (!empty($email) and !empty($password)) {
            if (strlen($email) > 8 and strlen($email) < 32 and strlen($password) > 8 and strlen($password) < 32) {

                $sql = 'select * from tbl_user where email=? and password=? and is_admin=1';
                $result = $this->doSelect($sql, [$email, $password]);

                if (sizeof($result) == 1) {

                    session_regenerate_id();
                    $_SESSION['admin_id'] = $result[0]['id'];
                    $_SESSION['is_login'] = 'xr3f';
                    //tariffs


                    //end tariffs
                    return 1;
                } else {
//                    echo 'Username Or Password Invalid';
                    return -2;
                }
            } else {
//                echo 'lenght error';
                return -1;
            }

        } else {
            return 0;
        }

    }

    function getUserInfo()
    {
         $admin_id = model::sessionGet('admin_id');
        $sql = 'select * from tbl_user where id=?';
        $result = $this->doSelect($sql, [$admin_id],1);
        return $result;
    }

    function resetPassword($data)
    {
         $admin_id = model::sessionGet('admin_id');

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
                        $status = $this->doQuery($sql, [$newPassword, $admin_id]);
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

        $url=URL.'adminlogin/resetpassword?error='. $error;
        echo'<script>location.href ="'.$url.'";</script>';
    }

    function logOut()
    {
         session_unset();
        session_destroy();
        $url=URL.'index';
        echo'<script>location.href ="'.$url.'";</script>';

    }
}

?>