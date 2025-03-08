<?php

class model_post extends model
{

    function getLocationCountry()
    {

        $tariffs_id = $this->sessionGet('tariffs_id');

        $sql = 'select * from tbl_tariffs where id=?';
        $tariff = $this->doSelect($sql, [$tariffs_id], 1);
        $country_ids = $tariff['country_ids'];
        $country_ids = explode(',', $country_ids);
        $country = [];
        foreach ($country_ids as $key => $country_id) {
            $sql = 'select * from tbl_location where id=?';
            $result = $this->doSelect($sql, [$country_id], 1);
            $country[$key] = $result;
        }
        return $country;
    }

    function getCategory()
    {
        $tariffs_id = $this->sessionGet('tariffs_id');

        $sql = 'select * from tbl_tariffs where id=?';
        $tariff = $this->doSelect($sql, [$tariffs_id], 1);
        $category_ids = $tariff['category_ids'];
        $category_ids = explode(',', $category_ids);
        $category = [];
        foreach ($category_ids as $key => $category_id) {
            $sql = 'select * from tbl_category where id=?';
            $result = $this->doSelect($sql, [$category_id], 1);
            $category[$key] = $result;
        }
        return $category;

    }

    function search($data)
    {
        $category = $data['category'];
//        $continent = $data['continent'];
        $country = $data['country'];
        $asc = $data['asc'];

        $string = ' where 1=1 ';
        $order = ' order by id ';
        if ($category != 0) {
            $string = $string . ' and category_id=' . $category;
        }
//        if ($continent != 0) {
//            $string = $string . ' and continent_id=' . $continent;
//        }
        if ($country != 0) {
            $string = $string . ' and country_id=' . $country;
        }
        if ($asc == 'true') {
            $string = $string . $order . ' asc';
        }
        if ($asc == 'false') {
            $string = $string . $order . ' desc';
        }



        $sql = "SELECT p.*,c.title as nameCategory,l.name as continentLocation,lo.name as countryLocation
        FROM tbl_post p
        LEFT JOIN tbl_category c ON p.category_id=c.id
        LEFT JOIN tbl_location l ON p.continent_id=l.id
        LEFT JOIN tbl_location lo ON p.country_id=lo.id
        " . $string . " ";


        $result = $this->doSelect($sql);

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