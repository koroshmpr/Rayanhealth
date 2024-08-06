<div class="d-flex justify-content-center align-items-center gap-4">
    <?php
    $socials = get_field('socials', 'options');
    $size = $args['size'] ?? 30;
    $args = array(
        'sizeSvgX' => $size,
        'sizeSvgY' => $size,
    );
    if ($socials):
        foreach ($socials as $social): ?>
            <a target="_blank"
               class="d-flex gap-2 align-items-center text-white-50"
               title="<?= $social['name']; ?>" aria-label="<?= $social['name']; ?>"
               href="<?= $social['link']['url']; ?>">
                <?= get_template_part('template-parts/svg/' . $social['name'], true, $args); ?>
            </a>
        <?php endforeach;
    endif; ?>
</div>