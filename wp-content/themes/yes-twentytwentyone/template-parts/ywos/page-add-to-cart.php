<?php include('header-no-menu.php'); ?>


<script type="text/javascript">
    $(document).ready(function () {
        console.log('test');
        var url_string  = window.location.href;
        var url         = new URL(url_string);
        var paramPlanID = url.searchParams.get('planid');
        if (paramPlanID !== null) {
            buyPlan(paramPlanID);
        } else {
            history.back();
        }
    });
</script>


<?php include('footer-no-newsletter.php'); ?>