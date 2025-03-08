<?php

class admindashbord extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $orderStat=$this->model->getStat();
        $data=['orderSata'=>$orderStat];
        $this->view('admin/dashbord/index',$data,1,1);
    }
}


?>


