<?php
/** Template Name: about us */
get_header(); ?>
    <section class="container py-5">
        <h3 class="text-primary small text-center"><?= get_field('cta-title') ?></h3>
        <div class="pb-4 pt-1 fs-1 fw-bold text-center text-dark text-opacity-75"><?= get_field('cta-description') ?></div>
        <div class="col-lg-8 mx-auto d-grid gap-2 d-lg-flex justify-content-center overflow-hidden">
            <img data-aos="fade-right" class="col-lg-6 object-fit-cover img-fluid"
                 src="<?= get_field('cta-box-img')['url']; ?>" alt="<?= get_field('cta-box-img')['title']; ?>">
            <div data-aos="fade-left" class="bg-dark bg-opacity-10 p-5 row align-content-center">
                <h4 class="text-dark fw-bold">
                    <?= get_field('cta-box-title'); ?>
                </h4>
                <div>
                    <?= get_field('cta-box-content'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark bg-opacity-10">
        <div class="container py-4">
            <h3 class="text-primary small text-center"><?= get_field('history-title') ?></h3>
            <div class="pb-4 pt-1 fs-1 fw-bold text-center text-dark text-opacity-75"><?= get_field('history-description') ?></div>
            <div class="text-center"><?= get_field('history-content'); ?></div>
            <div class="col-lg-8 mx-auto py-4">
                <?php $mobileImg = get_field('history-img_mobile'); ?>
                <img data-aos="zoom-in"
                     class="object-fit-cover img-fluid <?= $mobileImg ? 'd-none d-lg-inline' : ''; ?>"
                     src="<?= get_field('history-img')['url']; ?>" alt="<?= get_field('history-img')['title']; ?>">
                <?php if ($mobileImg) : ?>
                    <img data-aos="zoom-in"
                         class="object-fit-cover img-fluid d-lg-none"
                         src="<?= $mobileImg['url']; ?>" alt="<?= $mobileImg['title']; ?>">
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
$showPersonnels = get_field('show-personnels');
if ($showPersonnels):
    $personnels = get_field('personnels');
    if ($personnels) :
        ?>
        <section class="container py-5">
            <h5 class="text-center fs-5 pb-4 text-primary text-opacity-75"> <?= get_field('personnels_title') ?? ''; ?></h5>
            <div class="row row-cols-lg-3 row-cols-md-2 justify-content-start align-items-start">
                <?php foreach ($personnels as $index => $personnel): ?>
                  <div class="p-2" data-aos="zoom-in" data-aos-delay="<?= $index;?>00">
                      <div class="d-flex gap-4 bg-info bg-opacity-10 p-3 align-items-center justify-content-start">
                          <img class="col-2 rounded-circle object-fit-cover img-fluid" src="<?= $personnel['image']['url'] ?? ''; ?>"
                               alt="<?= $personnel['image']['title'] ?? ''; ?>">
                          <div>
                              <h6 class="border-end border-primary pe-3 text-primary fs-6 text-opacity-75"><?= $personnel['name'] ?? ''; ?></h6>
                              <div class="text-primary fw-bold fs-5"><?= $personnel['position'] ?? ''; ?></div>
                          </div>
                      </div>
                  </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif;
endif; ?>
<?php get_footer(); ?>