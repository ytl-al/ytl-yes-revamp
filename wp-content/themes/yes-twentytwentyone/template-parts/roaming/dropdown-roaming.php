<?php 
    $lang           = get_bloginfo('language');
    $text_select_country  = 'Select a Country';
    if ($lang == 'ms-MY') {
        $text_select_country  = 'Pilih Negara';
    }
?>

<select class="roaming-rates-list" id="roaming-rates-picker" name="roaming-rates-picker" data-placeholder="<?php echo $text_select_country; ?>">
    <?php
    if ($args['data_roaming']) :
        foreach ($args['data_roaming'] as $data_roaming) :
            foreach ($data_roaming as $data) :
    ?>
                <option value="<?= $data['id'] ?>"><?= $data['country_name']; ?></option>
    <?php
                break;
            endforeach;
        endforeach;
    endif;
    ?>
</select>