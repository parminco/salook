<?php

class model_personnel extends model
{
    function getPersonnel()
    {
        $sql='select * from tbl_personnel order by id desc';
        $result=$this->doSelect($sql);
        return $result;
    }
}

?>