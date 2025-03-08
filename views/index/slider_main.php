<link type="text/css" rel="stylesheet" href="public/css/slidermain.css">

<div class="slideshow-container">
    <?php
    $slider = $data['slider'];
    foreach ($slider as $row) {
        ?>
        <!-- swiper-slide-->

            <div class="mySlides fade">
                <a href="<?= $row['link'] ?>">
                    <img src="public\images\slider\<?= $row['id'] ?>.jpg" style="width:100%">
                    <div class="text"><?= $row['title'] ?></div>
                </a>
            </div>
        </a>
        <?php
    }
    ?>



    <a class="prev2" onclick="plusSlides(1)" style="left: 0">&#10095;</a>
    <a class="next2" onclick="plusSlides(-1)">&#10094;</a>

</div>
<br>

<div style="text-align:center">
    <?php
    $slider =sizeof($data['slider']);
    for($count=0;$count<$slider;$count++) {
    ?>
    <span class="dot" onclick="currentSlide(<?=$count?>)"></span>
        <?php
    }
    ?>
</div>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>

