<?php
if (!isset($args['cidade_news_query']) || !is_a($args['cidade_news_query'], WP_Query::class)) {
    throw new InvalidArgumentException('The $cidade_news_query must be a WP_Query::class instance.');
}

$cidade_news_query = $args['cidade_news_query'];
?>

<?php if ($cidade_news_query->have_posts()): ?>
    <section class="section cidade-section context-cidade">
        <div class="header with-line">
            <h2>Cidade</h2>
        </div>

        <ul class="results news">
            <?php while ($cidade_news_query->have_posts()): $cidade_news_query->the_post() ?>
                <li class="item">
                    <a href="<?= esc_url(the_permalink()) ?>" title="<?= esc_attr(the_title()) ?>" aria-label="Notícia <?= esc_attr(the_title()) ?>">
                        <article <?php post_class(); ?>>
                            <div class="item-image">
                                <figure>
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail(size: 'medium', attr: ['alt' => get_the_title(), 'loading' => 'lazy']) ?>
                                    <?php else: ?>
                                        <img src="<?= esc_url(asset_img('placeholder.svg')) ?>" alt="<?= esc_attr(the_title()) ?>" loading="lazy">
                                    <?php endif; ?>
                                </figure>
                            </div>

                            <div class="item-data">
                                <h3 class="title">
                                    <?= get_the_title() ?>
                                </h3>

                                <p class="excerpt">
                                    <?= get_the_excerpt() ?>
                                </p>

                                <?php the_human_date() ?>
                            </div>
                        </article>
                    </a>
                </li>
            <?php endwhile ?>
            <?php wp_reset_postdata() ?>
        </ul>

        <div class="footer">
            <a href="<?= esc_url(get_category_link(get_cat_ID('cidade'))) ?>" title="Ver mais" aria-label="Ver mais" class="see-more">
                <span>Ver mais</span>
                <i class="ph ph-caret-right"></i>
            </a>
        </div>
    </section>
<?php endif ?>