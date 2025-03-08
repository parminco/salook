<?php

class product extends Controller
{

    function __construct()
    {
        parent::__construct();
     }

    function index($category = 0)
    {

        $productsInfo = $this->model->getProducts($category);
        $categoryInfo = $this->model->getCategorys($category);

        $data = [
            'productsInfo' => $productsInfo,
            'categoryInfo' => $categoryInfo,
            'categorySelect' => $category,

        ];

        $this->view('product/search/index', $data);
    }

    function searchtitle()
    {
        $productTitle = $_POST['productTitle'];
        $result = $this->model->searchTitle($productTitle);
        echo json_encode($result);
    }

    function search()
    {
        $result = $this->model->search($_POST);
        echo json_encode($result);
    }

    function showProduct($productId)
    {
        $this->model->saveNewSeen($productId);

        $productInfo = $this->model->getProductInfo($productId);
        $productGallery = $this->model->getProductGallery($productId);
        $commentProduct = $this->model->getCommentProduct($productId);
        $productDescription = $this->model->getProductDescription($productId);
        $ProductSimilar= $this->model->getProductSimilar($productInfo['category'],$productId);
        $data = [
            'productInfo' => $productInfo,
            'productGallery' => $productGallery,
            'commentProduct' => $commentProduct,
            'productDescription' => $productDescription,
            'ProductSimilar'=>$ProductSimilar
        ];
        $this->view('product/index', $data);
    }


    function checkUserLogin()
    {

        if (isset($_SESSION['user_id'])) {
            echo json_encode('isLogin');
        } else if (!isset($_SESSION['user_id'])) {
            echo json_encode('notLogin');
        }
    }

    function checkSetCookiePoint($productId, $param)
    {
        $nameSession = 'pointSession' . $productId;
        if (!isset($_SESSION[$nameSession])) {
            $result = $this->model->savePoint($productId, $param);
            echo json_encode($result);

        } else {
            echo json_encode('notScorePoint');
        }
    }

    function addcomment()
    {
        $this->model->addComment($_POST);
    }

}


?>