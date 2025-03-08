<?php

class adminslider extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $sliderInfo = $this->model->getSlider();
        $data = [
            'sliderInfo' => $sliderInfo
        ];
        $this->view('admin/slider/index', $data, 1, 1);
    }

    function addslider()
    {
        if (isset($_POST['title']))
        {
            $this->model->addSlider($_POST,$_FILES);
        }
        $this->view('admin/slider/addslider', '', 1, 1);
    }

    function deleteslider($slider_id)
    {
        $this->model->deleteSlider($slider_id);
    }

    function editslider($slider_id)
    {
        if (isset($_POST['title']))
        {
            $this->model->editSlider($_POST,$_FILES,$slider_id);
        }
        $sliderInfo=$this->model->getSlider2($slider_id);
        $data = [
            'sliderInfo' => $sliderInfo
        ];
        $this->view('admin/slider/editslider', $data, 1, 1);
    }
}

?>