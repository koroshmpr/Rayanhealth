<?php $banners = get_field('banners');
if ($banners) : ?>
    <section class="container py-5 px-lg-5">
        <div class="row row-cols-lg-2 justify-content-lg-between justify-content-center">
            <?php
            foreach ($banners as $index => $banner) :
                ?>
                <div class="p-3 overflow-hidden">
                    <div data-aos="fade-<?= $index % 2 == 0 ? 'right' : 'left'; ?>"
                         class="bg-light d-grid align-items-end rounded-2 shadow-sm border border-primary border-opacity-10 h-100 ">
                        <div class="pt-5 pb-1 text-center col-6 mx-auto">
                            <h4 class="text-<?= $banner['title_color'] ?? 'white'; ?> fs-5">
                                <?= $banner['title']; ?>
                            </h4>
                            <div class="text-<?= $banner['content_color'] ?? 'white'; ?> fs-1 fw-bold">
                                <?= $banner['content']; ?>
                            </div>

                        </div>
                        <div class="col-10 mx-auto mt-auto" data-aos="fade-up" data-aos-delay="500">
                            <img class="object-fit-cover <?= $banner['image_mobile'] ? 'd-none d-lg-inline' : ''; ?> w-100 h-100"
                                 src="<?= $banner['image']['url'] ?? ''; ?>"
                                 alt="<?= $banner['image']['title'] ?? ''; ?>">
                            <?php if ($banner['image_mobile']): ?>
                                <img class="object-fit-cover d-lg-none w-100"
                                     src="<?= $banner['image_mobile']['url'] ?? ''; ?>"
                                     alt="<?= $banner['image_mobile']['title'] ?? ''; ?>">
                            <?php endif; ?>
                            <?php if ($banner['button_text']): ?>
                                <a class="px-4 py-2 position-absolute bottom-0 start-0 mb-5 ms-3 fs-6 rounded-pill text-white bg-<?= $banner['button_color'] ?>"
                                   href="<?= $banner['link']['link'] ?? ''; ?>">
                                    <?= $banner['button_text'] ?>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            <?php
            endforeach; ?>
        </div>
    </section>
<?php
endif; ?>