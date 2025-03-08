<?php

class adminproduct extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        $productsInfo = $this->model->getProducts();
        $data = [
            'productsInfo' => $productsInfo
        ];
        $this->view('admin/product/index', $data, 1, 1);
    }

    function addproduct()
    {
        if (isset($_POST['title'])) {
            $this->model->addProduct($_POST, $_FILES);
        }
        $CategoryInfo = $this->model->getCategory();
        $LocationInfo = $this->model->getLocation();
        $data = [
            'categoryInfo' => $CategoryInfo,
            'locationInfo' => $LocationInfo,
        ];
        $this->view('admin/product/addproduct', $data, 1, 1);
    }

    function deleteproduct($product_id)
    {
        $this->model->deleteProduct($product_id);
    }

    function addproductfile($product_id)
    {
        if (isset($_POST['type'])) {
            $this->model->addProductFile($_POST, $_FILES, $product_id);
        }
        $data = ['product_id' => $product_id];
        $this->view('admin/product/addproductfile', $data, 1, 1);
    }


    function addproductgallery($product_id)
    {
        if (isset($_FILES['image'])) {
            $this->model->addProductGallery($_FILES, $product_id);
        }

        $gallery = $this->model->getGallery($product_id);
        $data = ['gallery' => $gallery, 'product_id' => $product_id];
        $this->view('admin/product/addproductgallery', $data, 1, 1);
    }

    function deleteproductgallery($product_id, $img_name)
    {
        $this->model->deleteProductGallery($product_id, $img_name);
    }

    function addproductdescription($product_id)
    {
        if (isset($_POST['title'])) {
            $this->model->addProductDescription($_POST, $product_id);
        }

        $ProductDescription = $this->model->getProductDescription($product_id);

        $data = ['ProductDescription' => $ProductDescription, 'product_id' => $product_id];

        $this->view('admin/product/addproductdescription', $data, 1, 1);
    }

    function deleteproductdescription($product_id)
    {
        $this->model->deleteProductDescription($product_id);

    }

    function editproduct($product_id)
    {
        if (isset($_POST['title'])) {
            $this->model->editProduct($_POST,$_FILES, $product_id);
        }

        $productInfo = $this->model->getProductInfo($product_id);
        $categoryInfo= $this->model->getCategory();


        $data = ['productInfo' => $productInfo, 'product_id' => $product_id,'categoryInfo'=>$categoryInfo];

        $this->view('admin/product/editproduct', $data, 1, 1);
    }

    function adddiscountcode(){
        if (isset($_POST['name']))
        {
            $this->model->addDiscountCode($_POST);
        }
        $this->view('admin/product/adddiscountcode',[], 1, 1);
    }
}

?>