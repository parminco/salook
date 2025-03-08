<?php

class admincustomerslogo extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $customersLogo = $this->model->getCustomersLogo();
        $data = [
            'customersLogo' => $customersLogo
        ];
        $this->view('admin/customerslogo/index', $data, 1, 1);
    }

    function deletelogo($logo_id)
    {
        $this->model->deleteLogo($logo_id);

    }
    function addlogo()
    {
        if (isset($_POST['title']))
        {
            $this->model->addLogo($_POST,$_FILES);
        }
        $this->view('admin/customerslogo/addlogo', '', 1, 1);
    }
}

?>