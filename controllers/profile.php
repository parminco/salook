<?php

class profile extends Controller
{


    function __construct()
    {
        parent::__construct();
         if (!isset($_SESSION['user_id'])) {
            header('location:' . URL . 'index');;
        }

    }

    function index()
    {
        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();
        $data = [
            'userInfo' => $userInfo,
            'userTariffs' => $userTariffs
        ];

        $this->view('profile/index', $data);
    }

    function orders()
    {
        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();
        $orders = $this->model->getOrders();
        $data = [
            'userInfo' => $userInfo,
            'orders' => $orders,
            'userTariffs' => $userTariffs
        ];
        $this->view('profile/orders', $data);
    }

    function order($orderKey = '')
    {
        if ($orderKey == '') {
            header('location:' . URL . 'profile');;
        }
        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();
        $orderInfo = $this->model->getOrderInfo($orderKey);
        $data = [
            'userInfo' => $userInfo,
            'orderInfo' => $orderInfo,
            'userTariffs' => $userTariffs
        ];
        $this->view('profile/order_info', $data);
    }


    function ads()
    {

        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();
        $ads = $this->model->getAds();
        $data = [
            'userInfo' => $userInfo,
            'ads' => $ads,
            'userTariffs' => $userTariffs
        ];
        $this->view('profile/ads', $data);
    }

    function remove_ads($ads_id)
    {
        $this->model->remove_ads($ads_id);
    }

    function ads_edit($ads_id)
    {

        if (isset($_POST['title'])) {
            $this->model->ads_edit($_POST, $_FILES, $ads_id);

        }

        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();
        $ads = $this->model->getAds();
        $ads_info = $this->model->getAdsInfo($ads_id);
        $data = [
            'userInfo' => $userInfo,
            'ads' => $ads,
            'userTariffs' => $userTariffs,
            'ads_info' => $ads_info
        ];

        $this->view('profile/ads_edit', $data);
    }


    function add_ads()
    {
        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();

        $data = [
            'userInfo' => $userInfo,
            'userTariffs' => $userTariffs
        ];

        $status = $this->model->check_limit_ads();
        if ($status == 'true') {
            if (isset($_POST['title'])) {
                $this->model->add_ads($_POST, $_FILES);

            }

            $this->view('profile/add_ads', $data);
        } else {
            $this->view('profile/add_ads_error', $data);
        }

    }

    function resetpassword()
    {

        if (isset($_POST['newPassword'])) {

            $this->model->resetPassword($_POST);

        }
        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();

        $data = [
            'userInfo' => $userInfo,
            'userTariffs' => $userTariffs
        ];
        $this->view('profile/reset_password', $data);

    }

    function editprofile()
    {

        if (isset($_POST['name'])) {

            $this->model->editProfile($_POST, $_FILES);

        }

        $userInfo = $this->model->getUserInfo();
        $userTariffs = $this->model->getUserTariffs();

        $data = [
            'userInfo' => $userInfo,
            'userTariffs' => $userTariffs
        ];
        $this->view('profile/edit_profile', $data);
    }

    function checkproductlinkexpire()
    {
        if (isset($_GET['key'])) {
            $key = $_GET['key'];
            $this->model->checkProductLinkExpire($key);
        }
    }


}

?>