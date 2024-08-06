<article class="bg-dark bg-opacity-10 pb-3 h-100">
    <a class="overflow-hidden" href="<?php the_permalink(); ?>">
        <img class="w-100 object-fit-cover" src="<?php echo the_post_thumbnail_url(); ?>"
             alt="<?= get_the_title(); ?>">
        <div class="p-4 py-2 py-lg-4 card-container row align-items-end">
            <div class="mb-auto">
                <p class="small pe-2 border-end text-dark border-opacity-10 border-dark mt-2 text-opacity-50 fw-bold"> <?= get_the_date('d  F , Y'); ?></p>
                <h5 class="fw-bold"><?= get_the_title(); ?></h5>
                <p class="fs-6 text-dark text-opacity-75"><?= wp_trim_words(get_the_content(), 20); ?></p>
            </div>
            <span class="bg-light w-auto text-dark text-opacity-50 fw-bold shadow-sm px-3 py-1 rounded-pill small">
                     <?php
                     $category_detail = get_the_category($post->ID);
                     $category_count = count($category_detail);
                     $i = 0;
                     foreach ($category_detail as $category) {
                         echo $category->name;
                         if (++$i !== $category_count) {
                             echo ' - ';
                         }
                     }
                     ?>
            </span>
        </div>
    </a>
</article>