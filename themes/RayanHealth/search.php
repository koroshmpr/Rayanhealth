<?php get_header(); ?>

    <section class="stickyForm container bg-white pt-2 z-2">
        <div class="col-lg-8 mx-auto py-3">
            <form class="bg-white order-last col-12 rounded-5 shadow-sm py-2 px-3 col-lg " method="get"
                  action="<?php echo esc_url(home_url('/')); ?>">
                <div class="input-group d-flex align-items-center justify-content-between">
                    <input id="search-form" type="search" name="s" value="<?= get_search_query(); ?>"
                           class="btn text-primary col text-end" placeholder="What are you looking for?"
                           aria-label="Search">
                    <button type="submit"
                            class="bg-white btn h-100 text-primary d-flex align-items-center rounded-pill"
                            aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="d-flex align-items-center">
            Searched for :
            <div class="overflow-hidden">
                <h1 class="fw-bold text-primary ms-3 pe-1 border-bottom border-2 border-primary pb-2 mb-0"
                    data-aos="fade-right" data-aos-duration="600"><?= get_search_query(); ?></h1>
            </div>
        </div>
    </section>

    <section class="result">
        <?php
        $post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : '';

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => $post_type ? $post_type : array('post', 'portfolio', 'services', 'product'),
            's' => get_search_query(),
            'paged' => $paged,
            'posts_per_page' => 10, // Number of posts per page
        );
        $post_type_query = new WP_Query($args);

        if ($post_type_query->have_posts()) {
            echo '<div class="row m-0 row-cols-lg-3 row-cols-xl-4 list-unstyled row-cols-md-2 bg-light justify-content-lg-start justify-content-center row-cols-1 py-5">';

            while ($post_type_query->have_posts()) {
                $post_type_query->the_post();
                if (get_post_type() == 'product') { ?>
                    <div class="p-4">
                        <?php wc_get_template_part('content', 'product'); ?>
                    </div>
                    <?php
                } elseif (get_post_type() == 'post') {
                    ?>
                    <div class="p-4">
                        <?php get_template_part('template-parts/blog/card'); ?>
                    </div>
                    <?php
                }
            }


            echo '</div>';

            // Display pagination links
            if ($post_type_query->max_num_pages > 1) {
                echo '<div class="pagination mt-4">';
                echo paginate_links(array(
                    'total' => $post_type_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                ));
                echo '</div>';
            }
        } else {
            echo '<p class="fs-2 pt-4 text-center">Not found!</p>';
        }

        wp_reset_postdata(); // Reset the post data
        ?>
    </section>

<?php get_footer(); ?>