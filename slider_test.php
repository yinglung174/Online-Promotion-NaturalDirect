<?php
//GET THE SLIDE INFORMATION
$query = "select * from slide_img";
$result = mysqli_query($conn, $query);
?>
<div id="slider-flexslider-elegant-0" class="slider slider-flexslider-elegant flexslider-elegant container">
    <div class="slider-wrapper">
        <ul  class="slides">
            <!-- while loop -->
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $img = str_replace("../", "", $row['path']);
                ?>
                <li>
                    <img style="width:1200px;height:400px;" src="<?php echo $img ?>" class="attachment-full" alt="00<?php echo $row['id'] ?>" />
                    <div class="slider-caption caption-right">
                        <div class="caption-wrapper">
                            <h2><?php echo $row['slogan_title'] ?></h2>
                            <h4></h4>
                            <p>
                                <?php echo $row['slogan_content'] ?>
                            </p>
                        </div>
                    </div>
                </li>
                <?php
                //end of while loop
            }
            ?>
        </ul>
    </div>
    <div class="slider-shadow"></div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var flex_caption_hide = function (slider) {
            var currSlideElement = slider;
            var caption_speed = 400;
            var width = parseInt($('.slider-caption', currSlideElement).outerWidth());
            var height = parseInt($('.slider-caption', currSlideElement).outerHeight());

            $('.caption-top', currSlideElement).animate({top: height * -1}, caption_speed);
            $('.caption-bottom', currSlideElement).animate({bottom: height * -1}, caption_speed);
            $('.caption-left', currSlideElement).animate({left: width * -1}, caption_speed);
            $('.caption-right', currSlideElement).animate({right: width * -1}, caption_speed);
        };

        var flex_caption_show = function (slider) {
            var nextSlideElement = slider;
            var caption_speed = 400;

            $('.caption-top', nextSlideElement).animate({top: 0}, caption_speed);
            $('.caption-bottom', nextSlideElement).animate({bottom: 0}, caption_speed);
            $('.caption-left', nextSlideElement).animate({left: 0}, caption_speed);
            $('.caption-right', nextSlideElement).animate({right: 0}, caption_speed);
        };

        $('#slider-flexslider-elegant-0 .slider-wrapper').flexslider({
            animation: 'fade',
            slideshowSpeed: 20000,
            animationSpeed: 800,
            pauseOnAction: false,
            controlNav: false,
            directionNav: true,
            touch: false,
            start: flex_caption_show,
            before: flex_caption_hide,
            after: flex_caption_show
        });
    });
</script>