<?php get_header('ywos-no-menu'); ?>
<script>
var clevertap = {event:[], profile:[], account:[], onUserLogin:[], region:'sg1', notifications:[], privacy:[]};
// replace with the CLEVERTAP_ACCOUNT_ID with the actual ACCOUNT ID value from your Dashboard -> Settings page
clevertap.account.push({"id": "6ZW-87W-796Z"});
clevertap.privacy.push({optOut: false}); //set the flag to true, if the user of the device opts out of sharing their data
clevertap.privacy.push({useIP: true}); //set the flag to true, if the user agrees to share their IP data
(function () {
        var wzrk = document.createElement('script');
        wzrk.type = 'text/javascript';
        wzrk.async = true;
        wzrk.src = ('https:' == document.location.protocol ? 'https://d2r1yp2w7bby2u.cloudfront.net' : 'http://static.clevertap.com') + '/js/clevertap.min.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wzrk, s);
})();
</script>
<style type="text/css">
    html,
    body {
        height: 100%;
    }

    body {
        background-color: #FFF;
        display: flex;
    }

    .layer-page {
        display: flex;
        flex-direction: column;
        overflow: visible;
        width: 100%;
    }

    main.site-main {
        flex: auto;
    }
</style>

<main class="clearfix site-main" id="primary" role="main">