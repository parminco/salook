<?php

class model_user_controller extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function newUser($data)
    {
        $name = $this->ClearInput($data['name']);
        $email = $this->ClearInput($data['email']);
        $password = $this->ClearInput($data['password']);
        $confirmPassword = $this->ClearInput($data['confirmPassword']);
        $phone = $this->ClearInput($data['phone']);
        $date = parent::jaliliDate('Y/n/j');


        if (!empty($email) and !empty($password) and !empty($name)) {
            if (strlen($email) > 8 and strlen($email) < 32 and strlen($password) > 8 and strlen($password) < 32) {
            if ($password==$confirmPassword) {

                $sql = 'select * from tbl_user where email=?';
                $result = $this->doSelect($sql, [$email]);

                if (sizeof($result) == 0) {

                    //save user
                    $sql = 'insert into tbl_user (name,email,password,phone,created_at) values (?,?,?,?,?)';
                    $params = [$name, $email, $password, $phone, $date];
                    $this->doQuery($sql, $params);

                    session_regenerate_id();
                    $user_id = parent::$conn->lastInsertId();
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['is_login'] = 'xr3f';
                    //end save user

//                    echo 'success regester user';
                    return 1;
                } else {
//                    echo 'Duplicate email';
                    return -2;
                }
            }
            else{
//                echo ' confirmPassword error';
                return -3;
            }
            } else {
//                echo 'lenght error';
                return -1;
            }

        } else {
//            echo 'empity';
            return 0;
        }

    }

    function checkUserLogin($data)
    {
        $email = $this->ClearInput($data['email']);
        $password = $this->ClearInput($data['password']);


        if (!empty($email) and !empty($password)) {
            if (strlen($email) > 8 and strlen($email) < 32 and strlen($password) > 8 and strlen($password) < 32) {

                $sql = 'select * from tbl_user where email=? and password=?';
                $result = $this->doSelect($sql, [$email, $password]);

                if (sizeof($result) == 1) {
                     session_regenerate_id();
                    $user_id = $_SESSION['user_id'] = $result[0]['id'];
                    $_SESSION['is_login'] = 'xr3f';
                    //tariffs
                    $time = time();
                    $sql = 'select * from tbl_tariffs_user where user_id=? and expire_time>?';
                    $tariffs = $this->doSelect($sql, [$user_id, $time]);
                    if (sizeof($tariffs) >= 1) {
                        $_SESSION['tariffs_id'] = $tariffs[0]['tariffs_id'];
                    }
                    //header('location:dashbord.php?SESSION=' . $_SESSION['tariffs_id']);
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

    function logOut()
    {
         session_unset();
        session_destroy();
        $url=URL.'index';
        echo'<script>location.href ="'.$url.'";</script>';

    }
}

?>