<?php
$videos_query = new WP_Query([
    'posts_per_page' => 4,
    'post_type' => 'videos',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'desc',
]);
?>

<?php if ($videos_query->have_posts()): ?>
    <section class="section videos-section" aria-label="Videos do Instagram">
        <div class="header">
            <h2>Vídeos</h2>
        </div>

        <ul class="results videos">
            <?php while ($videos_query->have_posts()): $videos_query->the_post() ?>
                <li class="item">
                    <a href="<?= esc_url(get_field('post_url')) ?>" title="<?= esc_attr(the_title()) ?>" aria-label="Título do vídeo <?= esc_attr(the_title()) ?>">
                        <article <?= esc_attr(post_class()); ?>>
                            <div class="item-image">
                                <figure>
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail(size: 'medium_large', attr: ['alt' => get_the_title(), 'loading' => 'lazy']) ?>
                                    <?php else: ?>
                                        <img src="<?= esc_url(asset_img('placeholder.svg')) ?>" alt="<?= esc_attr(the_title()) ?>" loading="lazy">
                                    <?php endif; ?>
                                </figure>
                            </div>

                            <div class="effect">
                                <i class="ph ph-play"></i>
                            </div>
                        </article>
                    </a>
                </li>
            <?php endwhile ?>
            <?php wp_reset_postdata() ?>
        </ul>

        <div class="footer">
            <a href="<?= esc_url(get_post_type_archive_link('videos')) ?>" title="Ver mais vídeos" aria-label="Ver mais vídeos" class="button">
                Ver mais vídeos
            </a>
        </div>
    </section>
<?php endif ?>