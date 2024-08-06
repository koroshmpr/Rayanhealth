<?php
/** Template Name: contact us */
global $cur_lan;
get_header(); ?>
<section class="position-relative aboutus_container">
    <?php $banner = get_field('banner_image') ?>
    <img class="w-100 object-fit-cover" src="<?= $banner['url'] ?? ''; ?>" alt="<?= $banner['title'] ?? ''; ?>">
    <div class="position-absolute start-50 translate-middle top-50 col-lg-4 col-11 text-white text-shadow">
        <h2 class="fw-bold heading"><?= get_field('banner_title') ?></h2>
        <div><?= get_field('banner_excerpt') ?></div>
    </div>
</section>

<section class="container py-4">
    <h1 class="text-uppercase text-primary fw-bold text-opacity-75"><?= get_the_title(); ?></h1>
    <article class="pb-3"><?php the_content(); ?></article>
    <?php $phones = get_field('phones', 'options');
    if ($phones):
        ?>
        <div class="row row-cols-lg-2 align-items-start">
            <?php foreach ($phones as $phone): ?>
                <div class="p-2">
                    <div class="border bg-info bg-opacity-10 border-dark border-opacity-10 p-3">
                        <div class="text-primary d-flex gap-2 align-items-center">
                            <svg width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                            </svg>
                            <?= $phone['title'] ?? ''; ?></div>
                        <a class="text-primary text-opacity-75" href="tel:<?= $phone['phone'] ?? ''; ?>"><?= $phone['phone'] ?? ''; ?></a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php $emails = get_field('emails', 'options');
    if ($emails):
        ?>
        <div class="row row-cols-lg-2 align-items-start border-top border-dark border-opacity-10 mt-3 pt-3">
            <?php foreach ($emails as $email): ?>
                <div class="p-2">
                    <div class="border border-dark bg-info bg-opacity-10 border-opacity-10 p-3">
                        <div class="text-primary d-flex gap-2 align-items-center">
                            <svg width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                            <?= $email['title'] ?? ''; ?></div>
                        <a class="text-primary text-opacity-75" href="mailto:<?= $email['email'] ?? ''; ?>"><?= $email['email'] ?? ''; ?></a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="d-flex gap-3 align-items-center border-top border-dark border-opacity-10 mt-3 pt-3">
        <h6 class="fw-bold mb-0 text-uppercase">Social Media :</h6>
        <div class="d-flex justify-content-start align-items-center gap-4">
            <?php
            $socials = get_field('socials', 'options');
            $size = $args['size'] ?? 40;
            $args = array(
                'sizeSvgX' => $size,
                'sizeSvgY' => $size,
            );
            if ($socials):
                foreach ($socials as $social): ?>
                    <a target="_blank"
                       class="d-flex gap-2 align-items-center text-primary"
                       title="<?= $social['name']; ?>" aria-label="<?= $social['name']; ?>"
                       href="<?= $social['link']['url']; ?>">
                        <?= get_template_part('template-parts/svg/' . $social['name'], true, $args); ?>
                    </a>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
