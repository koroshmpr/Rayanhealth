<?php
$maintenance = get_field('maintenance', 'option');
if (!$maintenance || (is_user_logged_in() && current_user_can('administrator'))):
    ?>
    </main>
    <?php
    $menuContainerClass = 'col-lg col-12 my-2 my-lg-0 text-center';
    $menuHeaderClass = 'fw-bold mb-2 text-white fs-5 text-center';
    $listContainerClass = 'list-unstyled pe-0 d-flex flex-lg-column flex-wrap gap-2 justify-content-center';
    $linkClass = 'lazy text-decoration-none text-light text-opacity-50';
    ?>
    <footer class="bg-primary py-lg-5">
        <div class="container">
            <div class="row py-5">
                <!--                column-01-->
                <div class="<?= $menuContainerClass; ?>">
                    <p class="<?= $menuHeaderClass; ?>">
                        <?php
                        $locations = get_nav_menu_locations();
                        $menu = wp_get_nav_menu_object($locations['footerLocationOne']);
                        echo $menu->name;
                        ?>
                    </p>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footerLocationOne',
                        'menu_class' => $listContainerClass,
                        'container' => false,
                        'menu_id' => 'footerLocationOne',
                        'item_class' => 'nav-item',
                        'link_class' => $linkClass,
                        'depth' => 1,
                    ));
                    ?>

                </div>
                <!--            column-02-->
                <div class="<?= $menuContainerClass; ?>">
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['footerLocationTwo']);
                    if ($menu) :
                        ?>
                        <p class="<?= $menuHeaderClass; ?>">
                            <?= $menu->name; ?>
                        </p>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footerLocationTwo',
                            'menu_class' => $listContainerClass,
                            'container' => false,
                            'menu_id' => 'footerLocationTwo',
                            'item_class' => 'nav-item',
                            'link_class' => $linkClass,
                            'depth' => 1,
                        ));
                    endif;
                    ?>
                </div>
                <!--            column-03-->
                <div class="<?= $menuContainerClass; ?>">
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['footerLocationThree']);
                    if ($menu) :
                        ?>
                        <p class="<?= $menuHeaderClass; ?>">
                            <?= $menu->name; ?>
                        </p>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footerLocationThree',
                            'menu_class' => $listContainerClass,
                            'container' => false,
                            'menu_id' => 'footerLocationThree',
                            'item_class' => 'nav-item',
                            'link_class' => $linkClass,
                            'depth' => 1,
                        ));
                    endif;
                    ?>
                </div>
                <!--            column-04-->
                <div class="<?= $menuContainerClass; ?>">
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['footerLocationFour']);
                    if ($menu) :
                        ?>
                        <p class="<?= $menuHeaderClass; ?>">
                            <?= $menu->name; ?>
                        </p>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footerLocationFour',
                            'menu_class' => $listContainerClass,
                            'container' => false,
                            'menu_id' => 'footerLocationFour',
                            'item_class' => 'nav-item',
                            'link_class' => $linkClass,
                            'depth' => 1,
                        ));
                    endif;
                    ?>
                </div>
            </div>
            <div class="row border-top border-light border-opacity-25 mt-3 py-5">
                <div class="col text-center">
                    <?php get_template_part('template-parts/global/site_logo'); ?>
                </div>
                <div class="<?= $menuContainerClass; ?>"></div>
                <div class="<?= $menuContainerClass; ?>"></div>
                <div class="<?= $menuContainerClass; ?>">
                    <p class="<?= $menuHeaderClass; ?>>">Social Media</p>
                    <?php get_template_part('template-parts/global/social-media'); ?>
                </div>

            </div>
        </div>
    </footer>
<?php
endif;
wp_footer(); ?>
</body>
</html>
