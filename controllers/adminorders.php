<?php

class  adminorders extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $orders = $this->model->getOrders();
        $data = [
            'orders' => $orders
        ];
        $this->view('admin/orders/index', $data, 1, 1);
    }

    function orderinfo($orderKey = '')
    {
        if ($orderKey == '') {
            header('location:' . URL . 'adminorders');;
        }

        $orderInfo = $this->model->getOrderInfo($orderKey);
        $data = [
            'orderInfo' => $orderInfo,
        ];
        $this->view('admin/orders/order_info', $data,1,1);
    }

}

?>