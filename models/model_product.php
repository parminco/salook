<?php

class model_product extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getProductInfo($productId)
    {
        $sql = 'select * from tbl_product where id=? and deleted_at=?';
        $productInfo = $this->doSelect($sql, [$productId, ''], 1);

        //calculate discount
        @$discount = ($productInfo['price'] * $productInfo['discount']) / 100;
        @$total_price = $productInfo['price'] - $discount;
        //end
        $productInfo['total_discount'] = $discount;
        $productInfo['total_price'] = $total_price;

        return $productInfo;
    }

    function getProductSimilar($category_id,$productId)
    {
        $sql = 'select * from tbl_product where category=? and id!=? order by id desc limit 5';
        $gallery = $this->doSelect($sql, [$category_id,$productId]);
        return $gallery;
    }

    function getCommentProduct($productId)
    {
        $sql = "SELECT tbl_product_comment.*,tbl_user.name 
        FROM tbl_product_comment
        right JOIN tbl_user ON tbl_product_comment.user_id=tbl_user.id
        where product_id=? and status=1 order by tbl_product_comment.id desc";
        $CommentProduct = $this->doSelect($sql, [$productId]);
        return $CommentProduct;
    }

    function getProductGallery($productId)
    {
        $sql = 'select * from tbl_gallery where idproduct=?';
        $gallery = $this->doSelect($sql, [$productId]);
        return $gallery;

    }

    function getProductDescription($productId)
    {
        $sql = 'select * from tbl_product_description where product_id=?';
        $productDescription = $this->doSelect($sql, [$productId]);
        return $productDescription;
    }


    function saveNewSeen($productId)
    {
        $sessionName = 'productSeen_' . $productId;
        if (!isset($_SESSION[$sessionName])) {
            $sql = 'update tbl_product set views=views+1 where id=?';
            $this->doQuery($sql, [$productId]);
            $_SESSION[$sessionName] = $sessionName;
        }

    }

    function savePoint($productId, $param)
    {
        $nameSession = 'pointSession' . $productId;

        if ($param == 'like') {
            $sql = 'update tbl_product set likecount = likecount+1 where id=?';

            $_SESSION[$nameSession] = $nameSession;
        }
        if ($param == 'dislike') {
            $sql = 'update tbl_product set dislikecount = dislikecount+1 where id=?';
            $_SESSION[$nameSession] = $nameSession;
        }
        $this->doQuery($sql, [$productId]);

        return 'successScorePoint';

    }

    function addComment($data)
    {
        $user_id = model::sessionGet('user_id');
        $comment = $this->ClearScreenText($data['comment']);
        $product_id = $data['productId'];
        $date = parent::jaliliDate('Y/n/j');
        $sql = 'insert into tbl_product_comment (user_id,product_id,comment,created_at,status) value (?,?,?,?,?)';
        $params = [$user_id, $product_id, $comment, $date, 0];
        $status = $this->doQuery($sql, $params);
        if ($status = 'true') {
            echo json_encode('addedComment');
        }
    }


    function getCategorys()
    {
        $sql = 'select * from tbl_category order by id desc ';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getProducts($category)
    {
        if ($category == 0) {
            $sql = 'select * from tbl_product where deleted_at=? order by id desc ';
            $result = $this->doSelect($sql, ['']);
        } else {
            $sql = 'select * from tbl_product where category=? and deleted_at=? order by id desc ';
            $result = $this->doSelect($sql, [$category, '']);
        }
        return $result;
    }

    function searchTitle($productTitle)
    {
        $productTitle = $this->ClearInput($productTitle);
        $sql = 'select * from tbl_product where title LIKE "%" ? "%" and deleted_at=? order by id desc ';
        $result = $this->doSelect($sql, [$productTitle, '']);
        return $result;
    }

    function search($data)
    {

//
//        $type = 1;
//        $asc = "false";
        $category = $data['category'];
        $asc = $data['asc'];


        $string = ' where deleted_at=?  ';
        $order = ' order by id ';


        if ($category != 0) {
            $string = $string . ' and category=' . $category;
        }
        if ($asc == 'true') {
            $string = $string . $order . ' asc';
        }
        if ($asc == 'false') {
            $string = $string . $order . ' desc';
        }


        $sql = "select * from tbl_product " . $string . " ";


        $result = $this->doSelect($sql, ['']);

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