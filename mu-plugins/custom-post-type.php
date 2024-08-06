<?php


function portfolio_post_types()
{
    // services post-type
    register_post_type('services', array(
        'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),
        'rewrite' => array('slug' => 'services'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'خدمات ما',
            'add_new' => 'افزودن خدمات',
            'add_new_item' => 'افزودن خدمات جدید',
            'edit_item' => 'ویرایش خدمات',
            'all_items' => 'همه ی خدمات',
            'singular_name' => 'خدمات'
        ),
        'menu_icon' => 'dashicons-list-view'
    ));
    register_taxonomy(
        'services_categories',
        'services',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی خدمات', // display name
            'query_var' => true,
        )
    );
    $labels = array(
        'name' => _x( 'Tags', 'taxonomy general name' ),
        'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Tags' ),
        'popular_items' => __( 'Popular Tags' ),
        'all_items' => __( 'All Tags' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Tag' ),
        'update_item' => __( 'Update Tag' ),
        'add_new_item' => __( 'Add New Tag' ),
        'new_item_name' => __( 'New Tag Name' ),
        'separate_items_with_commas' => __( 'Separate tags with commas' ),
        'add_or_remove_items' => __( 'Add or remove tags' ),
        'choose_from_most_used' => __( 'Choose from the most used tags' ),
        'menu_name' => __( 'برچسب خدمات' ),
    );

    register_taxonomy('service_tag','services',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag-services' ),
    ));
    // gallery post-type
}

add_action('init', 'portfolio_post_types');