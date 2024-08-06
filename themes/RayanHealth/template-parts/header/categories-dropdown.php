<nav class="position-relative">
    <?php
    $excluded_category_id = 15;
    $parent_categories = get_categories(array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'pad_counts' => false,
        'hierarchical' => 1,
        'hide_empty' => false,
        'exclude' => $excluded_category_id,
        'parent' => 0
    ));
    ?>
    <ul class="nav nav-tabs justify-content-center align-items-end gap-3 pt-lg-3" id="myTab" role="tablist">
        <?php
        if ($parent_categories) {
            foreach ($parent_categories as $key => $parent_cat) {
                $category_icon = get_term_meta($parent_cat->term_id, 'category-icon', true);
                ?>
                <li class="nav-pills text-center text-primary" role="presentation">
                    <button class="nav-link text-primary row gap-3 rounded-0" id="tab-<?= $key; ?>" data-bs-toggle="tab"
                            data-bs-target="#tab-pane-<?= $key; ?>" type="button" role="tab"
                            aria-controls="tab-pane-<?= $key; ?>" aria-selected="<?= $key == 0 ? 'true' : 'false'; ?>">
                        <?= $category_icon; ?>
                        <?= $parent_cat->name; ?>
                    </button>
                </li>
                <?php
            }
        }
        ?>
    </ul>

    <div class="tab-content bg-white position-absolute top-100 start-0 end-0 z-2" id="myTabContent">
        <?php
        if ($parent_categories) {
            foreach ($parent_categories as $key => $parent_cat) {
                ?>
                <div class="tab-pane fade" id="tab-pane-<?= $key; ?>" role="tabpanel" aria-labelledby="tab-<?= $key; ?>"
                     tabindex="0">
                    <div class="container">
                        <div class="row p-lg-4 p-2 pt-4 pt-lg-4 row-cols-lg-3 row-cols-2 row-gap-lg-4 megamenu justify-content-center justify-content-lg-start">
                            <?php
                            // First, display subcategories and their products
                            $subcategories = get_categories(array(
                                'taxonomy' => 'product_cat',
                                'orderby' => 'name',
                                'parent' => $parent_cat->term_id,
                                'hide_empty' => false,
                            ));

                            if ($subcategories) {
                                foreach ($subcategories as $sub_cat) {
                                    ?>
                                    <div class="row row-gap-3 align-content-start">
                                        <a href="<?= get_term_link($sub_cat); ?>" class="px-0 fs-4"><h6
                                                    class="mb-0"><?= $sub_cat->name; ?></h6></a>
                                        <?php
                                        // Display products of the current subcategory
                                        $products = new WP_Query(array(
                                            'post_type' => 'product',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'term_id',
                                                    'terms' => $sub_cat->term_id,
                                                ),
                                            ),
                                        ));

                                        if ($products->have_posts()) {
                                            while ($products->have_posts()) {
                                                $products->the_post();
                                                ?>
                                                <a class="px-0 text-dark" href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                                <?php
                                            }
                                            wp_reset_postdata();
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }

                            // Then, display products of the main category that do not belong to any subcategory
                            $subcat_ids = wp_list_pluck($subcategories, 'term_id');
                            $products_main_cat = new WP_Query(array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $parent_cat->term_id,
                                    ),
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $subcat_ids,
                                        'operator' => 'NOT IN',
                                    ),
                                ),
                            ));

                            if ($products_main_cat->have_posts()) {
                                ?>
                                <div class="row align-content-start row-gap-3">
                                    <h6 class="px-0">others</h6>
                                    <?php
                                    while ($products_main_cat->have_posts()) {
                                        $products_main_cat->the_post();
                                        ?>
                                        <a class="px-0 text-dark" href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

</nav>