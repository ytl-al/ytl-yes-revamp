<section class="dblock flexbox light" style="background-image:url('/wp-content/themes/yes.my/images/yes2018/Group 2512.jpg');">
    <div class="fullscreen centerize center-text">
        <div>
            <p class="shoutout lg">Is your device <b>5G ready?</b></p>

            <p class="shoutout-note">Check below!</p>
        </div>
    </div>

    <div class="bottom centerize"><span class="link-group"><a class="btn-scroll-down" href="#main-content"><svg class="ia ia-below"><use xlink:href="/ia-defs.svg#ia-below"></use></svg></a></span></div>
</section>

<section class="dblock flexbox" id="main-content">
    <div class="flexible">
        <div class="container container-filter oversized-1440">
            <div class="row">
                <?php get_template_part('templates/supported-devices/filter'); ?>

                <div class="col">
                    <div class="row">
                        <div class="d-lg-none"><button class="btn btn-primary" id="btn-overlay-show">Filter</button><br /> &nbsp;
                        </div>
                    </div>

                    <div class="row filter-storeitem storeitem-supported-devices">
                        <?php get_template_part('templates/supported-devices/devices'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('templates/supported-devices/scripts'); ?>