<?php

class model_admincommentproduct extends model
{
    function getCommentProduct()
    {
        $sql = 'select tbl_product_comment.*,tbl_user.email 
        from tbl_product_comment
        left join tbl_user on tbl_product_comment.user_id=tbl_user.id
        order by tbl_product_comment.id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function deleteComment($comment_id)
    {
        $sql='delete from tbl_product_comment where id=?';
        $this->doQuery($sql,[$comment_id]);

        $url=URL.'admincommentproduct';
        echo'<script>location.href ="'.$url.'";</script>';


    }
    function verificationComment($comment_id)
    {
        $sql='update tbl_product_comment set status=1 where id=?';
        $this->doQuery($sql,[$comment_id]);
        $url=URL.'admincommentproduct';
        echo'<script>location.href ="'.$url.'";</script>';

    }
}

?>