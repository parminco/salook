<?php

class user_controller extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function checkuserlogin()
    {
        $data = $_POST;
        $result = $this->model->checkUserLogin($data);
        echo json_encode($result);
    }

    function newuser()
    {

        $result = $this->model->newUser($_POST);
        echo json_encode($result);
    }

    function logout()
    {
        $this->model->logOut();
    }

}


?>