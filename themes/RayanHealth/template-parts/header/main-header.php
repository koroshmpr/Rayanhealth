<nav class="container d-flex pt-3 gap-3 justify-content-between align-items-center flex-wrap flex-lg-nowrap">
    <?php $btnClass = "btn btn-primary border border-primary rounded-circle px-2 py-2 lh-sm"; ?>
    <?php get_template_part('template-parts/global/site_logo'); ?>
    <div class="ms-auto d-flex flex-nowrap flex-lg-wrap gap-4 col">
        <?php
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
        if ($menu) :
            wp_nav_menu(array(
                'theme_location' => 'headerMenuLocation',
                'menu_class' => 'd-lg-flex d-none list-unstyled mb-0 gap-2 align-items-center desktop-menu flex-wrap',
                'container' => false,
                'menu_id' => 'headerMenuLocation',
                'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
                'link_class' => 'nav-link text-primary', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                'depth' => 1,
            ));
        endif;
        ?>
        <div class="offcanvas offcanvas-end bg-transparent ps-5" tabindex="-1" id="offcanvasNavbar"
             aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header bg-primary pt-4 justify-content-start">
                <button type="button" class="btn-close me-auto ms-0 bg-white text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-primary">
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
                if ($menu) :
                    wp_nav_menu(array(
                        'theme_location' => 'headerMenuLocation',
                        'menu_class' => 'row p-0 fs-4 list-unstyled mb-0 gap-2 align-items-center desktop-menu flex-wrap',
                        'container' => false,
                        'menu_id' => 'navbarTogglerMenu',
                        'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
                        'link_class' => 'nav-link text-white fw-bold', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                        'depth' => 1,
                    ));
                endif;
                ?>
            </div>
        </div>
        <form class="bg-white order-last col-12 rounded-5 shadow-sm py-2 px-3 col-lg " method="get"
              action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group d-flex align-items-center justify-content-between">
                <input id="search-form" type="search" name="s"
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
    <div class="d-flex align-items-center order-first order-lg-last justify-content-center gap-2">
        <?php
        if (is_user_logged_in()) { ?>
            <div class="d-flex align-items-center position-relative">
                <a type="button" class="<?= $btnClass; ?>"
                   id="dropdownMenuReference"
                   data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                    <span class="visually-hidden">Toggle Dropdown</span>
                </a>
                <ul class="dropdown-menu py-0 text-center"
                    aria-labelledby="dropdownMenuReference">
                    <li class="py-2 bg-primary mb-2">
                        <a class="no-decoration fw-bold text-center text-white"
                           href="/my-account/">
                            <?php global $current_user;
                            wp_get_current_user();
                            echo $current_user->display_name;
                            ?>
                        </a>
                    </li>
                    <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                        <li>
                            <a class="dropdown-item <?php echo wc_get_account_menu_item_classes($endpoint); ?> "
                               href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php } else { ?>
            <a type="button" class="<?= $btnClass; ?>" href="/my-account">
                <svg width="20" height="20" fill="currentColor"
                     class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
            </a>
        <?php }
        ?>
        <a href="/cart" class="<?= $btnClass; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                <path d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                      stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                      stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                      stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M9 8H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <?php global $woocommerce;
            if ($woocommerce->cart->cart_contents_count):?>
                <span class="translate-middle bg-info small position-absolute top-0 start-0 text-white fw-bolder rounded-circle badge-shop d-flex justify-content-center align-content-center">
                <?= sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>
            <?php endif; ?>
        </a>
        <button class="<?= $btnClass; ?> d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <svg width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
        </button>
    </div>
</nav>