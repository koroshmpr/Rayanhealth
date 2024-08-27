<?php $sliders = get_field('slider');
if ($sliders) : ?>
    <section class="swiper hero_slider" data-aos="zoom-in" data-aos-delay="200">
        <div class="swiper-wrapper hero">
            <?php
            $i = 1;
            foreach ($sliders as $slider) : ?>
                <div class="swiper-slide h-auto position-relative text-center">
                    <?php
                    if ($slider['slide_type'] == 'image') : ?>
                        <img class="object-fit-cover <?= $slider['image_mobile'] ? 'd-none d-lg-inline' : ''; ?> w-100 h-100"
                             src="<?= $slider['image']['url'] ?? ''; ?>"
                             alt="<?= $slider['image']['title'] ?? ''; ?>">
                        <?php if ($slider['image_mobile']): ?>
                            <img class="object-fit-cover d-lg-none w-100"
                                 src="<?= $slider['image_mobile']['url'] ?? ''; ?>"
                                 alt="<?= $slider['image_mobile']['title'] ?? ''; ?>">
                        <?php endif;
                    elseif ($slider['slide_type'] == 'video') : ?>
                        <video autoplay controls='false' class="object-fit-cover w-100 h-100"
                               src="<?= $slider['video'] ?? ''; ?>"></video>
                    <?php endif; ?>
                    <div class="position-absolute top-0 bottom-0 start-lg-50 start-0 col-lg-4 text-end col-11 py-5">
                        <h4 data-aos="fade-up" data-aos-delay="200"
                            class="text-<?= $slider['title_color'] ?? 'white'; ?> fs-2 fw-bold">
                            <?= $slider['title']; ?>
                        </h4>
                        <div data-aos="fade-up" data-aos-delay="300"
                             class="text-<?= $slider['content_color'] ?? 'white'; ?> fs-4 text-opacity-75">
                            <?= $slider['content']; ?>
                        </div>
                        <?php if ($slider['button_text']): ?>
                            <div data-aos="fade-up" data-aos-delay="400">
                                <a class="mt-4 py-2 fs-5 px-3 rounded-pill btn btn-<?= $slider['button_color']; ?>"
                                   href="<?= $slider['link']['link'] ?? ''; ?>">
                                    <?= $slider['button_text'] ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                $i++;
            endforeach; ?>
        </div>
        <div data-aos="fade-left" data-aos-delay="400"
             class="swiper-button-next position-absolute top-50 start-0 z-3 text-primary ms-5">
            <svg width="50" height="50" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
            </svg>
        </div>
        <div data-aos="fade-right" data-aos-delay="400"
             class="swiper-button-prev position-absolute top-50 end-0 z-3 text-primary me-5">
            <svg width="50" height="50" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            </svg>
        </div>
    </section>
<?php
endif; ?>