<section class="container position-relative py-4 px-0">
    <div class="d-flex justify-content-between align-items-center pb-3">
        <div>
            <h4 class="mb-0 fw-bold">Latest news</h4>
        </div>
    </div>
    <div class="swiper blogPost">
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => '10',
            'ignore_sticky_posts' => true
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <div class="swiper-wrapper">
            <?php while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div class="swiper-slide">
                    <?php get_template_part('template-parts/blog/card'); ?>
                </div>
            <?php
            endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <div data-aos="fade-left" data-aos-delay="100" class="blog-button-next position-absolute top-50 start-0 z-3 text-primary ms-n5">
        <svg width="50" height="50" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
        </svg>
    </div>
    <div data-aos="fade-right" data-aos-delay="100"  class="blog-button-prev position-absolute top-50 end-0 z-3 text-primary me-n5">
        <svg width="50" height="50" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
        </svg>
    </div>
</section>