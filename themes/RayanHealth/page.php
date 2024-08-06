<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package baloochy
 */

get_header();

if (is_shop()) { ?>
    <div class="container py-4">
        <?php // Include the custom WooCommerce shop page template
        get_template_part('woocommerce/archive-product');
        ?>
    </div>
<?php }
elseif (is_product_category()) {
    // Include the product category template
    get_template_part('taxonomy-product_cat');
} else { ?>
    <div id="primary" class="container py-3">
        <?php
        iF( is_user_logged_in()) {?>
            <h1 class="mb-4 text-primary fs-1 border-end pe-3 border-primary text-uppercase text-opacity-75"><?= get_the_title(); ?></h1>
        <?php }
        // Use do_shortcode to process shortcodes in the content
        echo do_shortcode(get_the_content()); ?>
    </div>
<?php }
get_footer();
?>