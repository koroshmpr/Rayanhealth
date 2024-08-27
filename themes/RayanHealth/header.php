<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="description" content="<?= get_bloginfo('description'); ?>">
    <meta name="author" content="<?= get_bloginfo('name'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <!--    --><?php //= get_field('scripts', 'option') ?? '<!-- no-scripts added   -->'; ?>
</head>
<body <?php body_class(); ?>>
<?php
$maintenance = get_field('maintenance', 'option');
$maintenance_page_url = home_url('/maintenance');

// Redirect non-logged-in users to the maintenance page if maintenance mode is active
if ($maintenance && !is_user_logged_in() && !is_page('maintenance')) {
    wp_redirect($maintenance_page_url);
    exit; // Ensure the script stops executing after the redirect
}

// Display the header and main content if maintenance mode is off or if the user is an admin
if (!$maintenance || (is_user_logged_in() && current_user_can('administrator'))) {
?>
<header> <!-- Fixed typo from haeder to header -->
    <?php
    get_template_part('template-parts/header/top-bar');
    get_template_part('template-parts/header/main-header');
    get_template_part('template-parts/header/categories-dropdown');
    ?>
</header>
<?php get_template_part('template-parts/global/backToTop'); ?>
<main class="overflow-hidden <?= is_product() ? 'container py-3' : ''; ?>">
<?php } ?>