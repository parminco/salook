<?php

class model_index extends model
{

    function __construct()
    {
        parent::__construct();

    }

    function getSlider()
    {
        $sql = 'select * from tbl_slider order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getCategory()
    {
        $sql = 'select * from tbl_category limit 9';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getProductLimit()
    {
        $sql = "SELECT tbl_product.*,tbl_category.title as title_category
        FROM tbl_product
        left JOIN tbl_category ON tbl_product.category=tbl_category.id 
        where  tbl_product.deleted_at=?
        order by id desc  limit 9";
        $result = $this->doSelect($sql,['']);
        return $result;
    }

    function getAds()
    {
        $sql = 'select * from tbl_ads where type=1 and status=1 order by id desc  limit 8';
        $seller = $this->doSelect($sql);

        $sql = 'select * from tbl_ads where type=2  and status=1 order by id desc  limit 8';
        $buyer = $this->doSelect($sql);

        return ['seller' => $seller, 'buyer' => $buyer];
    }

    function getCustomersLogo()
    {
        $sql = 'select * from tbl_customers_logo  order  by id desc limit 20';
        $result = $this->doSelect($sql);
        return $result;
    }

}

?>