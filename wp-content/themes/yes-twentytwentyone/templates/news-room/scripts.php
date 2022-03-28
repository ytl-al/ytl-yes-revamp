<?php
global $wp;
$current_page_slug = $wp->request;
?>
<script type="text/javascript">
    $(document).ready(function() {
        //set labels by param values
        var url_string = window.location.href;
        var url = new URL(url_string);

        var current_cat = '';
        var current_year = '';
        var current_month = '';

        var $current_cat_label = $('#current-newsroom-cat');
        var $current_year_label = $('#current-newsroom-year');
        var $current_month_label = $('#current-newsroom-month');

        var $cat_list = $('#newsroom-cat > li');
        var $year_list = $('#newsroom-year > li');
        var $month_list = $('#newsroom-month > li');

        var setCurrentParam = function(url, param_name, list_dom, label_dom) {
            var param_val = url.searchParams.get(param_name);
            if (param_val && param_val.length > 0) {
                //find the name
                var current_name = list_dom.find("[data-value='" + param_val + "']").first().text();
                if (current_name && current_name.length > 0) {
                    label_dom.text(current_name);
                    return param_val;
                }
            }
            return '';
        };
        current_cat = setCurrentParam(url, 'cat', $cat_list, $current_cat_label);
        current_year = setCurrentParam(url, 'yr', $year_list, $current_year_label);
        current_month = setCurrentParam(url, 'mo', $month_list, $current_month_label);

        //setup events for filters
        var goFilterUrl = function(cat, yr, mo) {
            console.log(cat, yr, mo);
            var next_url = '/<?php echo $current_page_slug ?>?';
            var next_param = '';

            if (cat && cat.length > 0) {
                next_param += '&cat=' + cat;
            }

            if (yr && yr > 0) {
                next_param += '&yr=' + yr;
            }

            if (mo && mo > 0) {
                next_param += '&mo=' + mo;
            }

            if (next_param.length > 0) {
                next_param = next_param.substr(1);
            }

            location.href = next_url + next_param;
        };

        $cat_list.on("click", "a", function(e) {
            e.preventDefault();
            var $me = $(this);
            current_cat = $me.data('value');
            $current_cat_label.text($me.text());
            goFilterUrl(current_cat, current_year, current_month);
        });

        $year_list.on("click", "a", function(e) {
            e.preventDefault();
            var $me = $(this);
            current_year = $me.data('value');
            $current_year_label.text($me.text());
            goFilterUrl(current_cat, current_year, current_month);
        });

        $month_list.on("click", "a", function(e) {
            var $me = $(this);
            current_month = $me.data('value');
            $current_month_label.text($me.text());
            goFilterUrl(current_cat, current_year, current_month);
        });
    });
</script>