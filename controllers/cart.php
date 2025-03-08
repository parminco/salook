<?php


class cart extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $cartInfo = $this->model->getCart2();

        $data = [
            'cartInfo' => $cartInfo[0],
            'priceTotalall' => $cartInfo[1],
            'discountTotalall' => $cartInfo[2]
        ];
        $this->view('cart/index', $data);
    }

    function addtocart($productId)
    {
        $this->model->addToCart($productId);
    }

    function deletecart($cartId)
    {
        $this->model->deleteCart($cartId);
    }

    function saveorder()
    {
        $this->model->saveOrder($_POST);
    }

    function checkcodedsicount()
    {
        $result = $this->model->checkCodeDsicount($_POST);
        echo json_encode($result);
    }

}


?>