<?php

class model_ads extends model
{
    function getAdsInfo($ads_id)
    {

        $sql='select tbl_ads.*,tbl_user.name 
        FROM tbl_ads
        right JOIN tbl_user ON tbl_ads.user_id=tbl_user.id
        where tbl_ads.id=?';

        $result=$this->doSelect($sql,[$ads_id],1);
        return $result;
    }

    function search($data)
    {

//
//        $type = 1;
//        $asc = "false";
        $type = $data['type'];
        $asc = $data['asc'];


        $string = ' where 1=1 ';
        $order = ' order by id ';


        if ($type != 0) {
            $string = $string . ' and type=' . $type;
        }
        if ($asc == 'true') {
            $string = $string . $order . ' asc';
        }
        if ($asc == 'false') {
            $string = $string . $order . ' desc';
        }



        $sql = "select * from tbl_ads " . $string . " ";


        $result = $this->doSelect($sql);

//        $limit = 2;
//        $current_page = 1;

        $limit = $data['limit'];
        $current_page = $data['current_page'];
        $offset = ($current_page - 1) * $limit;
        $page_number = sizeof($result) / $limit;
        $page_number = ceil($page_number);
        $result = array_slice($result, $offset, $limit);
        return [$result, $page_number];
    }

}

?>
