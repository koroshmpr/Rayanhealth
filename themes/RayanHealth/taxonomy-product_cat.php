<?php
/**
 * The template for displaying product category archives.
 *
 * @link https://woocommerce.com/
 *
 * @package WooCommerce
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
?>

<section class="container py-4">

    <div class="row justify-content-between align-items-start pt-4">
        <div class="col-lg-3 pe-lg-4 order-last order-lg-first">
            <?php
            woocommerce_breadcrumb();
            ?>
            <h1 class="pb-3"><?= get_the_title(); ?></h1>
            <?php get_template_part('template-parts/products/archive-sidebar'); ?>
        </div>
        <?php
        // Ensure WooCommerce functions are available
        if (!function_exists('woocommerce_product_loop_start') || !function_exists('woocommerce_product_loop_end')) {
            return;
        }
        ?>

        <div class="col-lg-9">
            <?php
            // Custom query to get products in the current category
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => get_option('posts_per_page'),
                'paged' => max(1, get_query_var('paged')),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => get_queried_object()->slug,
                    ),
                ),
            );
            $products = new WP_Query($args);

            if ($products->have_posts()) {
                // Start the product loop
                woocommerce_product_loop_start();
                // Check if there are any products to display
                if ($products->have_posts()) {
                    while ($products->have_posts()) {
                        $products->the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        // Get the product template part
                        wc_get_template_part('content', 'product');
                    }
                    // Reset post data after the loop
                    wp_reset_postdata();
                }

// End the product loop
                woocommerce_product_loop_end();

                // Reset post data after the loop
                wp_reset_postdata();

                // WooCommerce Pagination
                global $wp_query;
                $total_products = $products->found_posts;
                $posts_per_page = $products->query_vars['posts_per_page'];
                $total_pages = ceil($total_products / $posts_per_page); // Use ceil to round up

                if ($total_pages > 1) {
                    ?>
                    <nav class="woocommerce-pagination p-4">
                        <?php
                        echo paginate_links(
                            array(
                                'base' => esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false)))),
                                'format' => '',
                                'add_args' => false,
                                'current' => max(1, get_query_var('paged')),
                                'total' => $total_pages,
                                'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                                'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                                'type' => 'list',
                                'end_size' => 3,
                                'mid_size' => 3,
                            )
                        );
                        ?>
                    </nav>
                    <?php
                }
            } else {
                ?>
                <h2 class="text-center fw-bold fs-4 border rounded-3 border-info p-5 bg-white bg-opacity-10">
                    محصولی یافت نشد
                </h2>
                <?php
            }
            ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>
