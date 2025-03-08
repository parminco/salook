<?php

class post extends Controller
{
    function __construct()
    {
        parent::__construct();

         $tariffs_id=model::sessionGet('tariffs_id');
//        echo 'tariffs_id= '.$tariffs_id;
        if ($tariffs_id=='false') {

            $url = URL . 'index?failedLogin';
            echo '<script>location.href ="' . $url . '";</script>';
        }
    }

    function index()
    {

        $country = $this->model->getLocationCountry();
        $category=$this->model->getCategory();
        $data = [
            'country' => $country,
            'category'=>$category
        ];
        $this->view('post/index',$data);
    }


    function search(){
        $result=$this->model->search($_POST);
        echo json_encode($result);

    }



}
