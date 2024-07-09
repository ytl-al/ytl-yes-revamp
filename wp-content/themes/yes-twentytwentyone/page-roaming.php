<?php
    get_header();

    $lang = get_bloginfo('language');
    $abs_path = 'template-parts/roaming';
    $page_template_path = "$abs_path/content-en";

    if ($lang == 'ms-MY') {
        $page_template_path = "$abs_path/content-bm";
    } else if ($lang == 'zh-CN') {
        $page_template_path = "$abs_path/content-ch";
    }
    $args_roaming   = [
        'post_type'     => 'roaming-rates',
        'post_status'   => 'publish',
        'posts_per_page'=> -1,
        'orderby'       => 'name',
        'order'         => 'ASC'
    ];

    $loop                   = new WP_Query($args_roaming);
    $data_roaming           = [];
    $data_roaming_country   = [];
    $data_roaming_topup    = [];
    $topup_arr_operators  = [];

    if ($loop->have_posts()) :
        while ($loop->have_posts()) :
            $loop->the_post();
            $arr_operators  = get_post_meta($post->ID, 'yesmy_roaming_operator', true);
            $topup_arr_operators[$post->ID] = array(
                'topup_100mb_per_day' => get_post_meta($post->ID, 'yesmy_roaming_topup_100mb_per_day', true),
                'topup_150mb_per_day' => get_post_meta($post->ID, 'yesmy_roaming_topup_150mb_per_day', true),
                'topup_200mb_per_day' => get_post_meta($post->ID, 'yesmy_roaming_topup_200mb_per_day', true),
                'topup_300mb_per_day' => get_post_meta($post->ID, 'yesmy_roaming_topup_300mb_per_day', true),
                'topup_400mb_per_day' => get_post_meta($post->ID, 'yesmy_roaming_topup_400mb_per_day', true),
                'topup_500mb_per_day' => get_post_meta($post->ID, 'yesmy_roaming_topup_500mb_per_day', true),
            );

            if ($arr_operators) :
                foreach ($arr_operators as $operator) :
                    $is_4g      = (isset($operator['yesmy_roaming_is_4g_lte'])) ? $operator['yesmy_roaming_is_4g_lte'] : '';
                    $data       = [
                        'id'                => $post->ID,
                        'country_name'      => $post->post_title,
                        'country_slug'      => $post->post_name,
                        'operatorName'      => $operator['yesmy_roaming_operator_name'],
                        'roamingRate'       => $operator['yesmy_roaming_internet_rate'],
                        'roamingType'       => $operator['yesmy_roaming_internet_rate_type'],
                        'quota'             => $operator['yesmy_roaming_daily_quota'],
                        'quotaDisclaimer'   => $operator['yesmy_roaming_quota_disclaimer'],
                        'is4g'              => ($is_4g == 'on') ? 1 : 0,
                        'callRate'          => $operator['yesmy_roaming_call_rate'],
                        'callToMalaysia'    => $operator['yesmy_roaming_call_back'],
                        'callToOther'       => $operator['yesmy_roaming_call_other_country'],
                        'receivingCallRate' => $operator['yesmy_roaming_receiving_calls'],
                        'smsRate'           => $operator['yesmy_roaming_sms'],
                        'aseanPlusCountries' => isset($operator['yesmy_roaming_internet_asean_plus']) ? $operator['yesmy_roaming_internet_asean_plus'] : '',    
                    ];
                    // die();
                    $data_roaming[$post->ID][]  = $data;

                    // print_r( $topup_arr_operators );
                endforeach;
            endif;
        endwhile;
    endif;

    wp_reset_postdata();

    $args_idd       = [
        'post_type'     => 'idd-rates',
        'post_status'   => 'publish',
        'posts_per_page' => -1,
        'orderby'       => 'name',
        'order'         => 'ASC'
    ];

    $loop           = new WP_Query($args_idd);
    $data_idd       = [];

    while ($loop->have_posts()) :
        $loop->the_post();
        $data_idd[$post->post_title]    = [
            'country_name'  => $post->post_title,
            'country_slug'  => $post->post_name,
            'prepaid'       => [
                'country'       => $post->post_title,
                'countryCode'   => get_post_meta($post->ID, 'yesmy_idd_prepaid_country_code', true),
                'callRateFixed' => get_post_meta($post->ID, 'yesmy_idd_prepaid_call_rate_fixed', true),
                'callRateMobile' => get_post_meta($post->ID, 'yesmy_idd_prepaid_call_rate_mobile', true),
                'smsRate'       => get_post_meta($post->ID, 'yesmy_idd_prepaid_sms_rate', true)
            ],
            'postpaid'      => [
                'country'       => $post->post_title,
                'countryCode'   => get_post_meta($post->ID, 'yesmy_idd_postpaid_country_code', true),
                'callRateFixed' => get_post_meta($post->ID, 'yesmy_idd_postpaid_call_rate_fixed', true),
                'callRateMobile' => get_post_meta($post->ID, 'yesmy_idd_postpaid_call_rate_mobile', true),
                'smsRate'       => get_post_meta($post->ID, 'yesmy_idd_postpaid_sms_rate', true)
            ]
        ];
    endwhile;

    wp_reset_postdata(); 
?>

<script type="text/javascript">
    var jsonRoaming = JSON.parse(JSON.stringify(<?= json_encode($data_roaming) ?>));
    var jsonIdd = JSON.parse(JSON.stringify(<?= json_encode($data_idd) ?>));
    var topupOprrators = JSON.parse(JSON.stringify(<?= json_encode($topup_arr_operators) ?>));
    // console.log(topupOprrators);
</script>

<?php get_template_part($page_template_path, '', ['data_roaming' => $data_roaming, 'data_idd' => $data_idd]); ?>

<?php get_footer(); ?>