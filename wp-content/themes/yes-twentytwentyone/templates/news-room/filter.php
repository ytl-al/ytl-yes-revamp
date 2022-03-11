<section id="filter-panel">
    <div class="container">
        <div class="row">
            <h1><img src="/wp-content/uploads/2022/03/filter-icon.png" alt="">Filter</h1>
            <div class="col-12 col-lg-4">
                <label>Category</label>
                <div class="dropdown">
                    <button class="btn filter-drop dropdown-toggle" type="button" id="caregories" data-bs-toggle="dropdown" aria-expanded="false">
                        All
                    </button>
                    <ul class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 59px);" data-popper-placement="bottom-start">
                        <li><a class="dropdown-item" href="#">All</a></li>
                        <?php
                        $cat_args   = [
                            'hide_empty' => false,
                            'taxonomy'  => 'news-room-category',
                            'orderby'   => 'name',
                            'order'     => 'ASC'
                        ];
                        $categories = get_categories($cat_args);

                        foreach ($categories as $category) :
                            if ($category->slug != 'featured') :
                        ?>
                                <li><a class="dropdown-item" data-value="<?= $category->name ?>" href="#"><?= $category->name ?></a></li>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <label>Year</label>
                <div class="dropdown">
                    <button class="btn filter-drop dropdown-toggle" type="button" id="year" data-bs-toggle="dropdown" aria-expanded="false">
                        All
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        $arr_years  = $args['arr_years'];
                        foreach ($arr_years as $year) :
                        ?>
                            <li><a class="dropdown-item" data-value="<?= $year ?>" href="#"><?= $year ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <label>Month</label>
                <div class="dropdown">
                    <button class="btn filter-drop dropdown-toggle" type="button" id="month" data-bs-toggle="dropdown" aria-expanded="false">
                        All
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">January</a></li>
                        <li><a class="dropdown-item" href="#">Febuary</a></li>
                        <li><a class="dropdown-item" href="#">March</a></li>
                        <li><a class="dropdown-item" href="#">April</a></li>
                        <li><a class="dropdown-item" href="#">May</a></li>
                        <li><a class="dropdown-item" href="#">June</a></li>
                        <li><a class="dropdown-item" href="#">July</a></li>
                        <li><a class="dropdown-item" href="#">August</a></li>
                        <li><a class="dropdown-item" href="#">September</a></li>
                        <li><a class="dropdown-item" href="#">October</a></li>
                        <li><a class="dropdown-item" href="#">November</a></li>
                        <li><a class="dropdown-item" href="#">December</a></li>
                    </ul>
                </div>
            </div>
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