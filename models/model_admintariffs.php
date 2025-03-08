<?php

class model_admintariffs extends model
{
    function getTariffs()
    {

        $sql = 'select * from tbl_tariffs where deleted_at=?';
        $result = $this->doSelect($sql, ['']);
        return $result;

    }

    function getCategory()
    {
        $sql = 'select * from tbl_category order by id desc ';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getLocation()
    {
        $sql = 'select * from tbl_location where parent!=0 order by id desc ';
        $result = $this->doSelect($sql);
        return $result;
    }

    function addTariffs($data)
    {
        $name = parent::ClearInput($data['name']);
        $price = abs($this->ClearInput($data['price']));
        $limit_ads = abs($this->ClearInput($data['limit_ads']));
        $credit_time = abs($this->ClearInput($data['credit_time']));
        $background = $data['background'];


        if (isset($data['category_ids']) and isset($data['country_ids'])) {
            $category_ids = $data['category_ids'];
            $country_ids = $data['country_ids'];

            $categoryTitle = [];
            foreach ($category_ids as $key => $category_id) {
                $sql = 'select title from tbl_category where id=?';
                $result = $this->doSelect($sql, [$category_id], 1);
                $categoryTitle[$key] = $result['title'];
            }

            $countryTitle = [];
            foreach ($country_ids as $key => $country_id) {
                $sql = 'select name from tbl_location where id=?';
                $result = $this->doSelect($sql, [$country_id], 1);
                $countryTitle[$key] = $result['name'];
            }

            $category_ids = join(',', $category_ids);
            $country_ids = join(',', $country_ids);

            $categoryTitle = serialize($categoryTitle);
            $countryTitle = serialize($countryTitle);

            $sql = 'INSERT INTO tbl_tariffs(name,limit_ads,category,category_ids,country,country_ids,price,credit_time,background) VALUES (?,?,?,?,?,?,?,?,?)';
            $params = [$name, $limit_ads, $categoryTitle, $category_ids, $countryTitle, $country_ids, $price, $credit_time, $background];
            $this->doQuery($sql, $params);
            $url = URL . 'admintariffs?success';
            echo '<script>location.href ="' . $url . '";</script>';
        } else {

            $url = URL . 'admintariffs/addtariffs?empty';
            echo '<script>location.href ="' . $url . '";</script>';
        }

    }

    function delete($tariffs_id)
    {
        $date = parent::jaliliDate('Y/n/j');

        $sql = 'update tbl_tariffs set deleted_at=? where id=?';
        $this->doQuery($sql, [$date, $tariffs_id]);

        $url = URL . 'admintariffs';
        echo '<script>location.href ="' . $url . '";</script>';
    }

    function getOrderTariffs()
    {


        $sql = 'select tbl_tariffs_user.*,tbl_user.email
        from tbl_tariffs_user
        left join tbl_user on tbl_tariffs_user.user_id=tbl_user.id
        order by tbl_tariffs_user.id desc';
        $result = $this->doSelect($sql);
        return $result;

    }
}

?>