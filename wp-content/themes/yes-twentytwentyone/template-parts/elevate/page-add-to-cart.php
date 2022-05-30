<?php require_once('includes/header.php') ?>
<script type="text/javascript" src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/js/elevate.js "></script>
<script type="text/javascript">

    $(document).ready(function () {
		var url_string = window.location.href;
		var url = new URL(url_string);
		var planId = url.searchParams.get('planId');
		if(planId){
			buyElevatePlan(planId);
		}
	});
</script>