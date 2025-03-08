<?php

class  adminmenu extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $menuInfo = $this->model->getMenu();
        $data = ['menuInfo' => $menuInfo];
        $this->view('admin/menu/index', $data, 1, 1);
    }

    function addmenu()
    {
        $this->model->addMenu($_POST);
    }

    function deletemenu($menu_id)
    {
        $this->model->deleteMenu($menu_id);
    }
}

?>