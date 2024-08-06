<aside class="col-lg-2 pt-4 pt-lg-0">
    <!--    search form-->
    <?php get_template_part('template-parts/blog/blog-search-form'); ?>
    <!--    archive posts by date-->
    <div>
        <h4 class="py-3 text-primary"><a href="<?= esc_url(get_post_type_archive_link('post')); ?>">Archive</a></h4>
        <?php
        global $post;

        $posts = get_posts(array(
            'post_type' => 'post',
            'nopaging' => true,
            'orderby' => 'date',
            'order' => 'DESC',
        ));

        $_year_mon = '';   // previous year-month value
        $_has_grp = false; // TRUE if a group was opened
        echo '<div class="year row">';
        $current_page_date = get_the_date('F , Y'); // Get the current page date

        foreach ($posts as $post) {
            setup_postdata($post);

            $time = strtotime($post->post_date);
            $showDate = get_the_date('F , Y');
            $year = date('Y', $time);
            $mon = date('F', $time);
            $year_mon = "$year-$mon";

            // Open a new group.
            if ($year_mon !== $_year_mon) {
                // Close previous group, if any.
                $_has_grp = true;

                // Check if the current date matches the loop date
                $link_class = ($current_page_date === $showDate) ? 'text-dark text-opacity-75 border-bottom border-info w-auto py-2 date-category active' : 'text-dark text-opacity-75 w-auto border-bottom border-info py-2 date-category';
                echo '<a class="' . $link_class . '" href="' . get_month_link($year, date('m', $time)) . '">';
                echo "$showDate";
                echo '</a>';
            }
            $_year_mon = $year_mon;
        }

        // Close the last group, if any.
        if ($_has_grp) {
            echo '</div>';
        }
        wp_reset_postdata();
        ?>
    </div>
</aside>