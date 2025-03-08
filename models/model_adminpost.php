<?php

class model_adminpost extends model
{
    function getPosts()
    {
//        $sql = 'select * from tbl_post order by id desc ';
        $sql = 'select p.*,c.title as categoryTitle,l.name as locationName 
        from tbl_post p 
        left join tbl_category c on p.category_id=c.id
        left join tbl_location l on p.country_id=l.id
        order by p.id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function deletePost($post_id)
    {
        $sql = 'delete from tbl_post where id=?';
        $this->doQuery($sql, [$post_id]);
        $url=URL.'adminpost';
        echo'<script>location.href ="'.$url.'";</script>';
    }

    function getCategory()
    {
        $sql = 'select * from tbl_category order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getLocation()
    {
        $sql = 'select * from tbl_location where parent!=0 order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function addPost($data)
    {
        $title = $this->ClearInput($data['title']);
        $category_id = $data['category_id'];
        $country_id = $data['country_id'];
        $description = $this->ClearScreenText($data['description']);
        $date = parent::jaliliDate('Y/n/j');
        $sql = 'insert into tbl_post (title,description,category_id,country_id,created_at) value (?,?,?,?,?)';
        $params = [$title, $description, $category_id, $country_id, $date];
        $this->doQuery($sql, $params);

        $url=URL.'adminpost?success';
        echo'<script>location.href ="'.$url.'";</script>';

    }

    function getPost($post_id)
    {
        $sql = 'select * from tbl_post where id=?';
        $result = $this->doSelect($sql, [$post_id], 1);
        return $result;
    }

    function editPost($data,$post_id)
    {
        $title = $this->ClearInput($data['title']);
        $category_id = $data['category_id'];
        $country_id = $data['country_id'];
        $description = $this->ClearScreenText($data['description']);
        $date = parent::jaliliDate('Y/n/j');
        $sql = 'update tbl_post set title=?,description=?,category_id=?,country_id=?,updated_at=? where id=?';
        $params = [$title, $description, $category_id, $country_id, $date,$post_id];
        $this->doQuery($sql, $params);
        $url=URL.'adminpost?edited';
        echo'<script>location.href ="'.$url.'";</script>';

    }

}

?>
