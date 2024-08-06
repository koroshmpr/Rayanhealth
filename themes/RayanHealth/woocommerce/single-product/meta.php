<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;
$titleClass = 'bg-primary bg-opacity-10 px-2 py-1 fw-bold text-primary';
?>
<div class="product_meta row row-gap-3">

    <?php do_action('woocommerce_product_meta_start'); ?>

    <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

        <span class="sku_wrapper"><span
                    class="<?= $titleClass; ?>"><?php esc_html_e('SKU:', 'woocommerce'); ?></span> <span
                    class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

    <?php endif; ?>

    <?php
    echo wc_get_product_category_list(
        $product->get_id(),
        ', ',
        '<span class="posted_in"><span class="' . $titleClass . '">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . '</span> ',
        '</span>'
    );
    ?>


    <?php
    echo wc_get_product_tag_list(
        $product->get_id(),
        ', ',
        '<span class="tagged_as"><span class="' . $titleClass . '">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . '</span> ',
        '</span>'
    );
    ?>


    <?php do_action('woocommerce_product_meta_end'); ?>

</div>
