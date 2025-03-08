<style>
    .collapsible {
        background-color: #4DB7FE;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: right;
        outline: none;
        font-size: 15px;
        border-radius: 4px;
        margin: 10px 0;

    }

    .active, .collapsible:hover {
        background-color: #384F95;
    }

    .collapsible:after {
        content: '\002B';
        color: white;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .contentcollapsible {
        padding: 0 18px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        background-color: #f1f1f1;
    }
</style>
<div class="tab">
    <div id="shop-tab1" class="tab-content  first-tab ">
        <div class="shop-tab-container">

            <p><?= $productInfo['title'] ?></p>

            <?php
            $productDescription = $data['productDescription'];
            foreach ($productDescription as $row) {
                ?>
                <button class="collapsible"><?=$row['title']?></button>
                <div class="contentcollapsible">
                    <p>
                        <?=$row['description']?>
                    </p>
                </div>

            <?php }
            ?>        </div>
    </div>
</div>


<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>