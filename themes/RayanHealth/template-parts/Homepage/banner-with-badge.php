<?php
$posters = get_field('Posters');
if ($posters):
    foreach ($posters as $poster):
        ?>
        <section class="position-relative py-5 my-5">
            <img class="w-100 object-fit-cover" height="700" src="<?= $poster['image']['url']; ?>" alt="<?= $poster['image']['title']; ?>">
            <div class="d-flex bg-info col-11 col-lg-6 flex-wrap text-white justify-content-center align-items-center gap-3 position-absolute bottom-0 start-50 translate-middle-x py-5 px-lg-5 px-4">
                <div data-aos="fade-down" class="col-lg-7 col-12">
                    <h4 class="fw-bold fs-2"><?= $poster['heading']; ?></h4>
                    <div class="fs-5 text-white text-opacity-75"><?= $poster['content']; ?></div>
                </div>
                <div data-aos="fade-left" class="col text-center">
                    <a class="rounded-pill px-3 py-2 fs-5 btn btn-white" href="<?= $poster['btn_link']['url'] ?? ''; ?>"><?= $poster['btn_text']; ?></a>
                </div>
            </div>
        </section>
    <?php
    endforeach;
endif; ?>