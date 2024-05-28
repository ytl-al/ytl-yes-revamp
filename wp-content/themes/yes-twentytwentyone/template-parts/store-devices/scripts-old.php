<script type="text/javascript">
    $(document).ready(function() {
       
        $(document).on('click', '.filter_option', function() {
            
            const selected_filter_value = $(this).val().toLowerCase();
            const selected_filter_name = $(this).attr('name').toLowerCase();
            const selected_option_length = $(`input[name="${selected_filter_name}"]:checked`).length;
            
            if (selected_filter_value === 'all') {
                $(`input[name="${selected_filter_name}"]`).prop('checked', false);
                $(`.filter_${selected_filter_name}_option_all`).prop('checked', true);
            } else {
                if( selected_option_length == 0 ) {
                    $(this).prop('checked', true);
                }else{
                    $(`.filter_${selected_filter_name}_option_all`).prop('checked', false);
                }
            }

            //get all selected filter brands
            const brand_check_values = $('input[name="fl-brand"]:checked').map(function() {
                return $(this).val().toLowerCase();
            }).get();

            //get all selected filter promotion
            const promotion_check_values = $('input[name="promotion"]:checked').map(function() {
                return $(this).val().toLowerCase();
            }).get();

            //fiter the procust acording to brand and promotion
            let number_of_device_show = 0;
            $('.storegrid').each(function() {
                const brand = $(this).data('brand').toLowerCase();
                const promotion = $(this).data('promotion').toLowerCase();
                const brandIndex = brand_check_values.indexOf(brand);
                const promotionIndex = promotion_check_values.indexOf(promotion);

                if ((brandIndex !== -1 || brand_check_values.includes('all')) &&
                    (promotionIndex !== -1 || promotion_check_values.includes('all'))) {
                    // $(this).show();
					$(this).removeClass("hide").addClass("show");
                    number_of_device_show++;
                    $('#noResultMessage').hide();
                } else {
                    // $(this).hide();
					$(this).removeClass("show").addClass("hide");
                    $('#noResultMessage').show();
                }
            });
            if( number_of_device_show < 1 ) {
                $('#noResultMessage').show();
            }else{
                $('#noResultMessage').hide();
            }
        });


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

        $("#search").click(function() {

            // Reset all options to "All"
            $('input[name="fl-brand"]').prop('checked', false);
            $('input[name="fl-brand"][value="All"]').prop('checked', true);
            $('input[name="promotion"]').prop('checked', false);
            $('input[name="promotion"][value="All"]').prop('checked', true);

            $('.storegrid').each(function() {
                $(this).removeClass('hide').addClass('show');               
            });
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

<script type="text/javascript">
    /**
     * Function to check if page is loaded from back button
     */
    function pageShown(evt) {
        if (evt.persisted) {
            toggleOverlay(false);
        }
    }
    window.addEventListener("pageshow", pageShown, false);
</script>