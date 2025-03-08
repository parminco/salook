<?php

class admintariffs extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $Tariffs = $this->model->getTariffs();
        $data = [
            'tariffsInfo' => $Tariffs
        ];
        $this->view('admin/tariffs/index', $data, 1, 1);
    }

    function ordertariffs()
    {
        $OrderTariffs = $this->model->getOrderTariffs();
        $data = [
            'OrderTariffs' => $OrderTariffs
        ];
        $this->view('admin/tariffs/ordertariffs', $data, 1, 1);
    }


    function addtariffs()
    {
        if (isset($_POST['name'])) {

            $this->model->addTariffs($_POST);

        }

        $category = $this->model->getCategory();
        $country = $this->model->getLocation();
        $data = [
            'category' => $category,
            'country' => $country
        ];
        $this->view('admin/tariffs/addtariffs', $data, 1, 1);

    }

    function delete($tariffs_id)
    {
        $this->model->delete($tariffs_id);
    }
}

?>