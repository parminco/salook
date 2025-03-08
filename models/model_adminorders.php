<?php

class model_adminorders extends model
{
    function getOrders()
    {
        $sql = 'select tbl_order_product.*,tbl_user.email
        from tbl_order_product
        left join tbl_user on tbl_order_product.user_id=tbl_user.id
        order by tbl_order_product.id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getOrderInfo($orderKey)
    {
        $sql = 'select * from tbl_order_product where order_code=?';
        $params = [$orderKey];
        $result = $this->doSelect($sql, $params, 1);
        return $result;
    }
}

?>