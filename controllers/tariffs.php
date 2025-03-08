<?php

class  tariffs extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $tariffs=$this->model->getTariffs();
        $data=[
            'tariffs'=>$tariffs
        ];
        $this->view('tariffs/index',$data);
    }

    function savetariffs(){


         $user_id=model::sessionGet('user_id');
        if ($user_id=='false') {
            $url = URL . 'tariffs?failedLogin';
            echo '<script>location.href ="' . $url . '";</script>';
        }
        else{
            $this->model->saveTariffs($_POST);
        }


    }
}

?>