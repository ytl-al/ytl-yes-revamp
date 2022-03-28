<section id="filter-panel">
    <div class="container">
        <div class="row">
            <h1><img src="/wp-content/uploads/2022/03/filter-icon.png" alt="">Filter</h1>
            <div class="col-12 col-lg-4">
                <label>Category</label>
                <div class="dropdown">
                    <button id="current-newsroom-cat" class="btn filter-drop dropdown-toggle" type="button" id="caregories" data-bs-toggle="dropdown" aria-expanded="false">
                        All
                    </button>
                    <ul id="newsroom-cat" class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 59px);" data-popper-placement="bottom-start">
                        <li><a class="dropdown-item" data-value="" href=" #">All</a></li>
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
                                <li><a class="dropdown-item" data-value="<?= $category->slug ?>" href="#"><?= $category->name ?></a></li>
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
                    <button id="current-newsroom-year" class=" btn filter-drop dropdown-toggle" type="button" id="year" data-bs-toggle="dropdown" aria-expanded="false">
                        All
                    </button>
                    <ul id="newsroom-year" class="dropdown-menu">
                        <li><a class="dropdown-item" data-value="0" href=" #">All</a></li>
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
                    <button id="current-newsroom-month" class="btn filter-drop dropdown-toggle" type="button" id="month" data-bs-toggle="dropdown" aria-expanded="false">
                        All
                    </button>
                    <ul id="newsroom-month" class="dropdown-menu">
                        <?php
                        $arr_months  = $args['arr_months'];
                        foreach ($arr_months as $month_val => $month_name) :
                        ?>
                            <li><a class="dropdown-item" data-value="<?= $month_val ?>" href="#"><?= $month_name ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>