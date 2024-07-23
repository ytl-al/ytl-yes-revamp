<script type="text/javascript">

$(document).ready(function() {
// filterDevices();
        $("#scroll-top").click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 500);
            return false;
        });

        $(".filter").click(function() {
            $("#filter-section").toggle();
        });
        $(".cancel-btn").click(function() {
            $("#filter-section").hide();
        });
        $(".search").click(function() {
            $(".device_cat_search").toggle();
        });


          // hero slider js
          $('.hero-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 8000,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    infinite: true,
                    dots: true,
                    slidesToScroll: 1,
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    infinite: true,
                    dots: true,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    infinite: true,
                    dots: true,
                    arrows: false
                }
            }]
        });

    });
</script>
