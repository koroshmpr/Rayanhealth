<?php
/** Template Name: blog archive */

get_header(); ?>

<section class="container py-lg-5 py-3">
    <h6 class="pb-3 text-primary fs-2 fw-bold">
        <?= esc_html__('Our latest news', 'rokarno'); ?>
    </h6>
    <div class="row row-cols-lg-2 row-cols-1 gap-5 gap-lg-0 px-2 px-lg-0">
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => '2',
            'ignore_sticky_posts' => true
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : $i = 0;
            /* Start the Loop */
            while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div class="p-3">
                    <?php get_template_part('template-parts/blog/card'); ?>
                </div>
            <?php
            endwhile;
        endif;
        wp_reset_postdata(); ?>
</section>
<section class="container pt-2 pb-5">
    <div class="row justify-content-center justify-content-lg-between  align-items-start">
        <?php get_template_part('template-parts/blog/archive-sidebar'); ?>
        <div class="col-lg-10 row row-cols-2 justify-content-center align-items-start">
            <?php
            $paged = get_query_var('paged') ?? 10;

            if (is_month()) {
                $current_year = get_query_var('year');
                $current_month = get_query_var('monthnum');

                // Your loop to display posts for the selected date
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'posts_per_page' => get_option('posts_per_page'),
                    'paged' => $paged,
                    'ignore_sticky_posts' => true,
                    'year' => $current_year,
                    'monthnum' => $current_month,
                );
            } else {
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'posts_per_page' => get_option('posts_per_page'),
                    'paged' => $paged,
                    'ignore_sticky_posts' => true,
                );
            }

            $loop = new WP_Query($args);

            if ($loop->have_posts()) :
                while ($loop->have_posts()) :
                    $loop->the_post();?>
                    <div class="p-2">
                        <?php get_template_part('template-parts/blog/card'); ?>
                    </div>
                <?php endwhile;
            else :
                echo '<p>' . esc_html('No posts found') . '</p>';
            endif;

            wp_reset_postdata();
            ?>

            <!-- Pagination -->
            <div class="pagination-container">
                <?php
                echo paginate_links(array(
                    'total' => $loop->max_num_pages,
                    'prev_text' => '<',
                    'next_text' => '>',
                    'prev_next' => true, // Disable default prev/next links
                    'type' => 'list', // Use an unordered list for pagination
                    'mid_size' => 3, // Number of page numbers to show before and after the current page
                    'end_size' => 3, // Number of page numbers to show at the beginning and end
                    'current' => max(1, get_query_var('paged')), // Current page number
                    'total' => $loop->max_num_pages, // Total number of pages
                    'before_page_number' => '<span class="page-number">', // Markup before each page link
                    'after_page_number' => '</span>', // Markup after each page link
                    'prev_class' => 'pagination-prev', // Custom class for previous link
                    'next_class' => 'pagination-next', // Custom class for next link
                    'current_class' => 'pagination-current', // Custom class for current page link
                    'page_class' => 'pagination-page', // Custom class for other page links
                ));
                ?>
            </div>

            <!-- End Pagination -->
        </div>

    </div>
</section>

<?php get_footer(); ?>
