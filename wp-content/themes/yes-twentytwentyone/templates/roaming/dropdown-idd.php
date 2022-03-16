<select class="roaming-idd-list" id="roaming-idd-picker" name="roaming-idd-picker" data-placeholder="Select a Country">
    <?php
    if ($args['data_idd']) :
        foreach ($args['data_idd'] as $data_idd) :
    ?>
            <option value="<?= $data_idd['country_name'] ?>"><?= $data_idd['country_name']; ?></option>
    <?php
            break;
        endforeach;
    endif;
    ?>
</select>