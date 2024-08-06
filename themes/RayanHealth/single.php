<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package korosh mpr
 */

// Check if it's a single post and not a product
if (is_single() && !is_product()) {
    get_header();

    while (have_posts()) :
        the_post();
        ?>
        <div class="container" id="blog">
            <section class="row py-4 justify-content-center">
                <h1 class="fs-2 col-lg-8 fw-bold text-dark text-center">
                    <?php the_title(); ?>
                </h1>
                <div class="d-inline-flex w-100 justify-content-center">
                        <span class="text-semi-light small fw-lighter d-flex gap-2 justify-content-center align-items-center">
                           <svg width="20" height="20" fill="currentColor"
                                class="bi bi-calendar3" viewBox="0 0 16 16">
  <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
  <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
</svg>
                         <?php echo get_the_date('d  F , Y'); ?>
                        </span>
                </div>
                <div class="text-center mt-1 d-flex gap-2 justify-content-center align-items-center">
                    <svg width="20" height="20" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z"/>
                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3"/>
                    </svg>
                    <?php echo do_shortcode('[reading_time]') ?></div>
                <?php echo do_shortcode('[TOC]') ?>
                <div class="col-12 text-center">
                    <?php if (get_the_post_thumbnail_url()) { ?>
                        <img src="<?php echo get_the_post_thumbnail_url() ?>"
                             class="col-lg-7 col-12 object-fit-cover p-2" height="400"
                             alt="<?php the_title(); ?>">
                    <?php } ?>
                </div>
            </section>
            <section class="row p-2 px-lg-0">
                <article
                        class="text-justify border border-opacity-25 border-dark border-opacity-10 p-3 p-lg-4 text-link">
                    <?php the_content();
                    wp_reset_postdata();
                    ?>
                </article>
                <?php get_template_part('template-parts/blog/share-post-button'); ?>
                <div class="col-12 py-lg-5 py-3">
                    <h6 class="pb-3 text-primary text-center fs-3 fw-bold">
                        <?= esc_html__('Latest News', 'rokarno'); ?>
                    </h6>
                    <div class="row row-cols-lg-3 row-cols-1 gap-5 gap-lg-0 px-2 px-lg-0">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => '3',
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
                    </div>
                </div>
            </section>
        </div>
    <?php endwhile;
    wp_reset_query();
    get_footer();
} // Check if it's a single product
elseif (is_product()) {
    wc_get_template_part('single-product');
}
?>