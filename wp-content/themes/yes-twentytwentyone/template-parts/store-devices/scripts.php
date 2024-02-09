<script type="text/javascript">
    $(document).ready(function() {
        $('input[name="fl-model"]').change(function() {
            if ($(this).val() === 'All' && $(this).is(':checked')) {
                $('input[name="fl-model"]').not(this).prop('checked', false);
            } else if ($(this).val() !== 'All' && $(this).is(':checked')) {
                $('#All').prop('checked', false);
            }
            filterDevices();
        });

        function filterDevices() {
            const checkedBrands = $('input[name="fl-model"]:checked').map(function() {
                return this.value;
            }).get();
  
            let anyDevicesFound = false;
            $('.storegrid').each(function() {
                const deviceBrand = $(this).attr('brand');

                if (checkedBrands.length === 0 || checkedBrands.includes('All') || checkedBrands.includes(deviceBrand)) {
                    $(this).removeClass('hide').addClass('show');
                    // $('.back_to_tp').css('display','block');
                    anyDevicesFound=true;
                } else {
                    $(this).removeClass('show').addClass('hide');

                }
            });
            if (!anyDevicesFound) {
                $('#noResultMessage').show();
                $('#scroll-top').hide(); // Hide scroll-top div
            } else {
                $('#noResultMessage').hide();
                $('#scroll-top').show(); // Show scroll-top div
            }
          }


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

        var selectedModels = [];
        $("input[name='fl-model1']").change(function() {
            var modelName = $(this).val();

            if ($(this).prop("checked")) {
                // Uncheck other checkboxes
                $("input[name='fl-model1']").not(this).prop("checked", false);
                selectedModels = [modelName];
            } else {
                selectedModels = [];
            }

            let anyPromotionFound = false;
            $(".storegrid").each(function() {
                var dataModel = $(this).attr("data-model");
                if (selectedModels.length === 0 || selectedModels.includes(dataModel) || selectedModels.includes('All')) {
                    $(this).removeClass("hide").addClass("show");
                    anyPromotionFound=true;
                } else {
                    $(this).removeClass("show").addClass("hide");
                }
            });
            if (!anyPromotionFound) {
                $('#noResultMessage').show();
                $('#scroll-top').hide(); // Hide scroll-top div
            } else {
                $('#noResultMessage').hide();
                $('#scroll-top').show(); // Show scroll-top div
            }
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