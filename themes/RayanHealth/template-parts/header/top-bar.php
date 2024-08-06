<?php
$topbar_list = get_field('top_bar_list', 'options');
if ($topbar_list):
    ?>
    <nav class="bg-primary">
        <div class="container swiper topBar">
            <div class="py-3 swiper-wrapper">
                <?php
                foreach ($topbar_list as $list):
                    $link = $list['link'];
                    $linkClass = 'swiper-slide d-flex justify-content-center align-items-center gap-2 text-center text-white';  // Fixed the semicolon issue

                    echo $link ?
                        '<a class="' . $linkClass . '" href="' . esc_url($link['url']) . '">' :
                        '<div class="' . $linkClass . '">';
                    echo $list['icon'];
                    echo $list['text'];

                    echo $link ? '</a>' : '</div>';
                    ?>

                <?php endforeach;
                ?>
            </div>
        </div>
    </nav>
<?php endif; ?>
