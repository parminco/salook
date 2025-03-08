<?php

Class Checkout extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_GET['Authority'])) {
            $result = $this->model->zarinpalCheckout($_GET);
            if (isset($result['Error'])) {
                $data = [
                    'Error' => $result['Error']
                ];
                $this->view('checkout/showerror', $data);

            } else {
                $data = [
                    'productPaid' => $result
                ];
                $this->view('checkout/factor', $data, 1, 1);
            }
        }
    }

    function tariffs(){
        if (isset($_GET['Authority'])) {
            $result = $this->model->zarinpalCheckoutTariffs($_GET);
            if (isset($result['Error'])) {
                $data = [
                    'Error' => $result['Error']
                ];
                $this->view('checkout/tariffs/showerror', $data);

            } else {
                $data = [
                    'tariffsPaid' => $result
                ];
                $this->view('checkout/tariffs/factor', $data, 1, 1);
            }
        }
    }



}

?>