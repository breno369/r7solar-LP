<?php
if (!isset($args['galerias_query']) || !is_a($args['galerias_query'], WP_Query::class)) {
    throw new InvalidArgumentException('The $galerias_query must be a WP_Query::class instance.');
}

$galerias_query = $args['galerias_query'];
?>

<?php if ($galerias_query->have_posts()): ?>
    <section class="section galerias-section context-galerias">
        <div class="header with-line">
            <h2>Galerias</h2>
        </div>

        <ul class="results galeria">
            <?php while ($galerias_query->have_posts()): $galerias_query->the_post() ?>
                <li class="item">
                    <a href="<?= esc_url(the_permalink()) ?>" title="<?= esc_attr(the_title()) ?>" aria-label="Card da notícia <?= esc_attr(the_title()) ?>">
                        <article <?php post_class(); ?>>
                            <div class="item-image">
                                <figure>
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail(size: 'medium_large', attr: ['alt' => get_the_title(), 'loading' => 'lazy']) ?>
                                    <?php else: ?>
                                        <img src="<?= esc_url(asset_img('placeholder.svg')) ?>" alt="<?= esc_attr(the_title()) ?>" loading="lazy">
                                    <?php endif; ?>
                                </figure>
                            </div>

                            <div class="item-data">
                                <p class="date">
                                    <i class="ph ph-calendar-blank"></i>
                                    <span><?= get_field("coverage_date") ?></span>
                                </p>

                                <h3 class="title">
                                    <?= get_the_title() ?>
                                </h3>

                                <div class="info">
                                    <p>
                                        <i class="ph ph-map-pin"></i>
                                        <span><?= get_field("coverage_location") ?></span>
                                    </p>
                                    <p>
                                        <i class="ph ph-camera"></i>
                                        <span><?= get_field("coverage_photographer") ?></span>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </a>
                </li>
            <?php endwhile ?>
            <?php wp_reset_postdata() ?>
        </ul>

        <div class="footer">
            <a href="<?= esc_url(get_category_link(get_cat_ID('galerias'))) ?>" title="Ver mais" aria-label="Ver mais" class="see-more">
                <span>Ver mais</span>
                <i class="ph ph-caret-right"></i>
            </a>
        </div>
    </section>
<?php endif ?>