<?php

class ads extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('ads/index');
    }

    function search()
    {
        $result = $this->model->search($_POST);
        echo json_encode($result);
    }


    function ads_info($ads_id = '')
    {
        $ads_info = $this->model->getAdsInfo($ads_id);
        $data = [
            'ads_info' => $ads_info
        ];
        $this->view('ads/ads_info', $data);
    }
}

?>