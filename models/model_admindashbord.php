<?php

class model_admindashbord extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getOrder()
    {
        $sql = 'select * from tbl_order_product where pay_status=1';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getStat()
    {
        $today_date = date('Y/m/d');
        $time = time();
        $last_week_time = $time - (7 * 24 * 3600);
        $last_week_date = date('Y/m/d', $last_week_time);
        $dates = $this->getRange($last_week_date, $today_date);

        $orders = $this->getOrder();
        $ordersStat = [];

        foreach ($dates as $date) {
            $jalili_date = self::MiladiTojalili($date);
            $ordersStat[$jalili_date] = 0;
        }

        foreach ($orders as $row) {
            $date_jalili = $row['date'];
            $date_miladi = self::jaliliToMiladi($date_jalili);
            if (in_array($date_miladi, $dates)) {
                $ordersStat[$date_jalili] += 1;
            }

        }
        return $ordersStat;


    }

    function getRange($startDate, $lastDate)
    {
        $curent = strtotime($startDate);
        $last = strtotime($lastDate);
        $dates = [];
        while ($curent <= $last) {
            $dates[] = date('Y/m/d', $curent);
            $curent = strtotime('+1 day', $curent);
        }

        return $dates;
    }
}


?>