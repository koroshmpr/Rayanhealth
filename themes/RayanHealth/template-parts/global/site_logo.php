<?php
$logo = get_field('site-logo', 'option');
?>
<a class="order-first" href="<?= home_url() ?>" aria-label="back to home page">
    <img class="img-fluid object-fit-contain" width="150" height="100" src="<?= $logo['url'] ?? ''; ?>"
         alt="<?= $logo['title'] ?? ''; ?>">
</a>