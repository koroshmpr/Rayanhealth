<aside class="col-11 row justify-content-center order-first order-xl-last mb-5 mb-xl-0">
    <div class="row column-gap-3 bg-info bg-opacity-25 column-gap-xl-0 p-2 pb-1 border border-white border-opacity-25 justify-content-xl-end justify-content-center" id="category-dropdown">
        <?php
        global $cur_lan;
        $current_category_id = get_queried_object_id(); // Get the current category ID
        // Get the current category
        $current_category = get_term($current_category_id, 'product_cat');
        $current_class = 'border-5 border-primary border-opacity-75 bg-opacity-75' ;
        // If the current category is a child category, get all sibling categories
        if ($current_category->parent != 0) {
            $parent_category_id = $current_category->parent;
            // Get parent category
            $parent_category = get_term($parent_category_id, 'product_cat');
            // Display parent category
            echo '<div class="my-1 col-12 border-' . ($cur_lan == 'en' ? 'start' : 'end') . ' bg-opacity-25 bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
            echo '<h6 class="category-title fw-bold mb-0 fs-6"><a href="' . esc_url(get_term_link($parent_category, $parent_category->taxonomy)) . '">' . $parent_category->name . '</a></h6>';
            echo '</div>';
            echo '<div class="my-1 col-xl-11 col-auto border-' . ($cur_lan == 'en' ? 'start' : 'end') . ' ' . $current_class . ' bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
            echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $current_category->name . '</h6>';
            echo '</div>';

        } else {
            // Display current category if it is a parent
            echo '<div class="my-1 col-12 border-' . ($cur_lan == 'en' ? 'start' : 'end') . ' ' . $current_class . ' bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
            echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $current_category->name . '</h6>';
            echo '</div>';
            $parent_category_id = $current_category_id;
        }

        // Get child categories of the parent category
        $child_categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'parent' => $parent_category_id,
            'hide_empty' => true,
            'exclude' => $current_category_id,
        ));

        if ($child_categories) {
            foreach ($child_categories as $child_category) {
                echo '<a href="' . esc_url(get_term_link($child_category, $child_category->taxonomy)) . '" class="my-1 col-xl-11 col-auto bg-opacity-25 bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
                echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $child_category->name . '</h6>';
                echo '</a>';
            }
        }
        ?>
    </div>
</aside>