<?php
class personnel extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $personnel=$this->model->getPersonnel();
        $data=[
            'personnel'=>$personnel
        ];
        $this->view('personnel/index',$data);
    }
}

?>