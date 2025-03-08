<?php


class index extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $slider=$this->model->getSlider();
        $category = $this->model->getCategory();
        $product = $this->model->getProductLimit();
        $ads = $this->model->getAds();
        $customersLogo = $this->model->getCustomersLogo();

        $data = [
            'slider' => $slider,
            'category' => $category,
            'product' => $product,
            'ads' => $ads,
            'customersLogo' => $customersLogo,
        ];
        $this->view('index/index', $data);


    }

}


?>