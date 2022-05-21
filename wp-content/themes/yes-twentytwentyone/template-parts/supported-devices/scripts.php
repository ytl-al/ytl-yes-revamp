<script type="text/javascript">
    $(document).ready(function() {
        var $storeitem = $(".storegrid");
        
        var $q = $("#q");
        var $fLocs = $("[name=c-region]");
        var $xsfLocs = $("[name=xs-c-region]");
        var $tabCats = $(".c-cat");

        var $sdCon = $("#sd-con");
        var $sdSort = $(".sd-sort");
        var $sdSortCurrent = $('#sd-current_sort');

        //var $btnMore = $("#btn-more");

        var q = "";
        var sCats = [];
        var sLocs = [];

        var $activeList = $();

        var render = function() {
            $storeitem.removeClass("show");

            //var n = 0;

            if (sCats.length == 0 && sLocs.length == 0) {
                $storeitem.addClass("show");
                //n = $storeitem.length;
            }

            $storeitem.each(function() {
                var $this = $(this);
                var title = $this.find('h2').first().text().toUpperCase();
                var catHit = false;
                var locHit = false;
                var notMatchQ = q.length > 0 && title.indexOf(q) < 0;

                var category = $this.attr("brand");
                var location = $this.attr("type");

                $.each(sCats, function(key, value) {
                    if (category.indexOf(value) > -1) {
                        catHit = true;
                        return false;
                    }
                });

                $.each(sLocs, function(key, value) {
                    if (location.indexOf(value) > -1) {
                        locHit = true;
                        return false;
                    }
                });

                var showItem = false;

                if ((sCats.length && sLocs.length)) {
                    if (locHit && catHit) showItem = true;
                } else {
                    showItem = locHit || catHit;
                }

                if (showItem) {
                    if(notMatchQ){
                        return false;
                    }
                    $this.addClass("show");
                } else {
                    //case show all
                    if($this.hasClass("show") && notMatchQ){
                        $this.removeClass("show");
                    }
                }
            });

        };

        var sortSD = function($elm, is_asc){
            return $elm.sort(function (a, b) {
                var contentA =parseInt($(a).data('sort').replace(/\D/g,''));
                var contentB =parseInt($(b).data('sort').replace(/\D/g,''));
                if(is_asc){
                    return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
                }
                //desc
                return (contentA < contentB) ? 1 : (contentA > contentB) ? -1 : 0;
            });
        };

        $q.on('keyup',function(){
            q = $(this).val().toUpperCase();
            render();
        });

        $tabCats.on('click',function(){
            var $me=$(this);
            sCats = [];
            var currentCat=$me.data('cat');
            if(currentCat != 'All'){
                sCats.push(currentCat);
            }
            render();
        });

        $fLocs.change(function() {
            sLocs = [];

            $fLocs.filter(":checked").each(function() {
                sLocs.push($(this).val());
            });

            render();
        });

        $xsfLocs.change(function() {
            sLocs = [];

            $xsfLocs.filter(":checked").each(function() {
                sLocs.push($(this).val());
            });

            render();
        });

        $sdSort.on('click',function(e){
            e.preventDefault();

            //sort
            var $me=$(this);
            var is_asc= ($me.data('direct')=='ASC');
            $sdCon.html(sortSD($storeitem, is_asc));
            $sdSortCurrent.text($me.text());

            //coordinate sort label
            $me.addClass('d-none');
            $sdSort.not($me).removeClass('d-none');
        });

        render();
    });
</script>