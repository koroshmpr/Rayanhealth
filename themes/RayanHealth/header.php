<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="description" content="<?= get_bloginfo('description'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <!--    --><?php //= get_field('scripts', 'option') ?? '<!-- no-scripts added   -->'; ?>
</head>
<body <?php body_class(); ?>>
<haeder>
    <?php
    get_template_part('template-parts/header/top-bar');
    get_template_part('template-parts/header/main-header');
    get_template_part('template-parts/header/categories-dropdown');
    ?>
</haeder>
<?php get_template_part('template-parts/global/backToTop'); ?>
<main class="overflow-hidden <?= is_product() ? 'container py-3' : ''; ?>">