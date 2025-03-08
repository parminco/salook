<?php

class admincommentproduct extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $commentProduct = $this->model->getCommentProduct();
        $data = [
            'commentProduct' => $commentProduct
        ];
        $this->view('admin/commentproduct/index', $data, 1, 1);
    }

    function deletecomment($comment_id)
    {
        $this->model->deleteComment($comment_id);
    }

    function verificationcomment($comment_id)
    {
        $this->model->verificationComment($comment_id);
    }

}

?>