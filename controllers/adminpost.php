<?php

class adminpost extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $posts = $this->model->getPosts();
        $data = [
            'posts' => $posts,
        ];
        $this->view('admin/post/index', $data, 1, 1);
    }

    function deletepost($post_id)
    {
        $this->model->deletePost($post_id);
    }

    function addpost()
    {
        if (isset($_POST['title'])) {
            $this->model->addPost($_POST);
        }
        $categoryInfo = $this->model->getCategory();
        $locationInfo = $this->model->getlocation();
        $data = [
            'categoryInfo' => $categoryInfo,
            'locationInfo' => $locationInfo,
        ];
        $this->view('admin/post/addpost', $data, 1, 1);

    }

    function editpost($post_id)
    {
        if (isset($_POST['title'])) {
            $this->model->editPost($_POST,$post_id);
        }
        $categoryInfo = $this->model->getCategory();
        $postInfo = $this->model->getPost($post_id);
        $locationInfo = $this->model->getlocation();
        $data = [
            'categoryInfo' => $categoryInfo,
            'locationInfo' => $locationInfo,
            'postInfo' => $postInfo,
        ];
        $this->view('admin/post/editpost', $data, 1, 1);

    }
}

?>