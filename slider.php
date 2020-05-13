
<!-- BEGIN FLEXSLIDER SLIDER -->
<div id="slider-polaroid-0" class="slider slider-polaroid polaroid no-responsive" style="height:530px;">
    <div class="thumbs  container">
        <!-- while loop -->
        <?php
        while ($row = mysqli_fetch_assoc($sresult)) {
            $img = str_replace("../", "", $row['path']);
            ?>
            <div class="thumb">
                <img style="width: 150px; height: 150px" src="<?php echo $img ?>" alt="<?php echo $img ?>" />
                <div class="slide-content container align-right full" style="background-image:url('<?php echo $img ?>'); background-size:cover;">
                    <div class="text" style="float:right; margin-right: 20%">
                        <h2 style="font-size:30px; color: whitesmoke"><b><?php echo $row['slogan_title'] ?></b></h2>
                        <p style="font-size:16px; color: white">
                            <?php echo $row['slogan_content'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#slider-polaroid-0').polaroid({
            animation: '',
            pause: 8000,
            animationSpeed: 800
        });
    });
</script>

<div class="mobile-slider">
    <div class="slider fixed-image container">
        <img src="images/slider/flexslider/fixed-polaroid.jpg" alt="" />
    </div>
</div>
</div>