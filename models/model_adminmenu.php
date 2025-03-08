<?php

class  model_adminmenu extends model
{
    function getMenu()
    {
        $sql = 'select * from tbl_menu';
        $result = $this->doSelect($sql);
        return $result;
    }

    function deleteMenu($menu_id)
    {
        $sql = 'delete from tbl_menu where id=?';
        $this->doQuery($sql, [$menu_id]);
        $url = URL . 'adminmenu';
        echo '<script>location.href ="' . $url . '";</script>';
    }

    function addMenu($data)
    {
        $tite = $this->ClearInput($data['title']);
        $link = $this->ClearInput($data['link']);

        $sql = 'insert into  tbl_menu (title,link) values(?,?)';
        $this->doQuery($sql, [$tite, $link]);
        $url = URL . 'adminmenu';
        echo '<script>location.href ="' . $url . '";</script>';

    }
}

?>