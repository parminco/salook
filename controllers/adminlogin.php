<?php

class  adminlogin extends Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        $this->view('admin/login/index', [], 1, 1);
    }

    function checkadminlogin()
    {
        $data = $_POST;
        $result = $this->model->checkAdminLogin($data);
        echo json_encode($result);
    }

    function resetpassword()
    {
        if (isset($_POST['newPassword'])) {
            $this->model->resetPassword($_POST);
        }
        $this->view('admin/login/reset_password', [], 1, 1);
    }

    function logout()
    {
        $this->model->logOut();
    }
}

?>