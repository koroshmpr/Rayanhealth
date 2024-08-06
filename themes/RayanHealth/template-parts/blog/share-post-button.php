<section class="col-12 col-lg-6 mx-auto row gap-2 justify-content-center align-items-center my-4">
        <p class="fs-5 fw-bold text-primary text-opacity-50 text-center mb-0 text-uppercase">Share this page</p>
        <?php
        // Get the current post URL
        $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // Get the post title and encode it for use in the share links
        $postTitle = urlencode(get_the_title());
        // Get the author's Twitter handle (replace "twitter" with your user meta key)
        $twitterHandle = get_the_author_meta('twitter');
        // Get the website name for use in the Twitter share link
        $websiteName = get_bloginfo('name');
        $btnClass = 'btn btn-primary rounded-circle px-2 py-2 lh-sm';
        ?>
        <ul class="d-flex list-unstyled gap-2 m-0 text-primary align-items-center justify-content-center">
            <li>
                <a class="<?= $btnClass; ?>"
                   aria-label="share on aparat"
                   href="https://www.aparat.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/aparat'); ?>
                </a>
            </li>
            <li>
                <a class="<?= $btnClass; ?>"
                   aria-label="share on telegram"
                   href="https://telegram.me/share/url?url=<?php echo urlencode($postUrl); ?>&text=<?php echo $postTitle; ?>">
                    <?php get_template_part('template-parts/svg/telegram'); ?>
                </a>
            </li>
            <li>
                <a class="<?= $btnClass; ?>"
                   aria-label="share on youtube"
                   href="https://www.youtube.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/youtube'); ?>
                </a>
            </li>
            <li>
                <a class="<?= $btnClass; ?>"
                   aria-label="share on instagram"
                   href="https://www.instagram.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/instagram'); ?>
                </a>
            </li>
            <li>
                <a class="<?= $btnClass; ?>"
                   aria-label="share on twitter"
                   href="https://twitter.com/intent/tweet?text=<?php echo urlencode('Check out this awesome post from ' . $websiteName . ': ') . $postTitle; ?>&url=<?php echo urlencode($postUrl); ?>&via=<?php echo urlencode($twitterHandle); ?>">
                    <?php get_template_part('template-parts/svg/twitter'); ?>
                </a>
            </li>
            <li>
                <a class="<?= $btnClass; ?>"
                   aria-label="share on linkedin"
                   href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($postUrl); ?>&title=<?php echo $postTitle; ?>">
                    <?php get_template_part('template-parts/svg/linkedin'); ?>
                </a>
            </li>
        </ul>
</section>