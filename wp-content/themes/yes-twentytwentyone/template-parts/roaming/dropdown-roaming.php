<select class="roaming-rates-list" id="roaming-rates-picker" name="roaming-rates-picker" data-placeholder="Select a Country">
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