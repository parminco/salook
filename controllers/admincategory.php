<?php

class admincategory extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $categoryInfo=$this->model->getCategory();
        $data=[
            'categoryInfo'=>$categoryInfo
        ];
        $this->view('admin/category/index',$data,1,1);
    }

    function deletecategory($category_id)
    {
        $this->model->deleteCategory($category_id);
    }

    function addcategory()
    {
        if (isset($_POST['title']))
        {
            $this->model->addCategory($_POST,$_FILES);
        }
        $this->view('admin/category/addcategory', '', 1, 1);
    }
    function editcategory($category_id)
    {
        if (isset($_POST['title']))
        {
            $this->model->editCategory($_POST,$_FILES,$category_id);
        }
        $categoryInfo=$this->model->getCategory2($category_id);
        $data = [
            'categoryInfo' => $categoryInfo
        ];
        $this->view('admin/category/editcategory', $data, 1, 1);
    }

}
?>