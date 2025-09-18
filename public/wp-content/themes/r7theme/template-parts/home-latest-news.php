<?php
if (!isset($args['latest_news_query']) || !is_a($args['latest_news_query'], WP_Query::class)) {
    throw new InvalidArgumentException('The $latest_news_query must be a WP_Query::class instance.');
}

$latest_news_query = $args['latest_news_query'];
?>

<?php if ($latest_news_query->have_posts()): ?>
    <section class="section latest-news-section">
        <div class="header">
            <h2>Últimas Notícias</h2>
        </div>

        <ul class="results news">
            <?php while ($latest_news_query->have_posts()): $latest_news_query->the_post() ?>
                <li class="item">
                    <a href="<?= esc_url(the_permalink()) ?>" title="<?= esc_attr(the_title()) ?>" aria-label="Card da notícia <?= esc_attr(the_title()) ?>">
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
                                <?php $terms = get_the_terms(get_the_ID(), 'category') ?>
                                <?php if (is_array($terms)): ?>
                                    <ul class="terms">
                                        <?php foreach ($terms as $term): ?>
                                            <li class="term">
                                                <span class="badge context-<?= esc_attr($term->slug) ?>"> <?= $term->name ?></span>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php endif ?>

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
            <a href="<?= esc_url(blog_url()) ?>" title="Ver mais" aria-label="Ver mais" class="see-more">
                <span>Ver mais</span>
                <i class="ph ph-caret-right"></i>
            </a>
        </div>
    </section>
<?php endif ?>