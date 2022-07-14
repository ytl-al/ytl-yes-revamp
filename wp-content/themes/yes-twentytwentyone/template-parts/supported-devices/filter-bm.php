<section id="filter-panel">
    <div class="container d-none d-sm-block">
        <div class="col-12">
            <h1><img src="/wp-content/uploads/2022/03/filter-icon.png" alt=""><?php echo esc_html__('Filter', 'yes.my'); ?></h1>
            <div class="ps-2">
                <?php
                global $tpl_data;
                $args_tags  = [
                    'hide_empty' => false,
                    'taxonomy'  => 'supported-device-tag',
                    'type'      => 'supported-device',
                    'orderby'   => 'name',
                    'order'     => 'DESC'
                ];
                $tpl_data['tags'] = get_categories($args_tags);
                foreach ($tpl_data['tags'] as $tag) :
                $tag_name = $tag->name;
                switch ($tag->slug) {
                    case 'data-only': 
                        $tag_name = 'Data Sahaja';
                        break;
                    case 'data-voice-over-lte': 
                        $tag_name = 'Data + Panggilan LTE';
                        break;
                    }
                ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag-<?= $tag->term_id ?>" name="c-region" value="<?= $tag->slug ?>">
                        <label class="form-check-label" for="tag-<?= $tag->term_id ?>"><?= $tag_name ?></label>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <div class="container d-block d-sm-none">
        <div class="dropdown xs-filter-container">
            <button class="btn filter-drop dropdown-toggle" type="button" id="xsRegionState" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Filter By Data Mode', 'yes.my'); ?></button>
            <ul class="dropdown-menu states" aria-labelledby="dropdownStates" data-filter-type="state">
                <?php
                foreach ($tpl_data['tags'] as $tag) :
                    $tag_name = $tag->name;
                    switch ($tag->slug) {
                        case 'data-only': 
                            $tag_name = 'Data Sahaja';
                            break;
                        case 'data-voice-over-lte': 
                            $tag_name = 'Data + Panggilan LTE';
                            break;
                    }
                ?>
                    <li>
                        <div class="form-check">
                            <label>
                                <input class="cardCheckBox" type="checkbox" id="tag-<?= $tag->term_id ?>" name="xs-c-region" value="<?= $tag->slug ?>"> <span><?= $tag_name ?></span>
                            </label>
                        </div>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var paramSupport = url.searchParams.get('support');

        if (paramSupport !== null) {
            var inputSupport = $('input[name="c-region"][value="' + paramSupport + '"]');
            if ($(inputSupport).length) {
                setTimeout(function() {
                    $(inputSupport).prop('checked');
                    $(inputSupport).trigger('click');
                }, 1000);
            }
        }
    });
</script>