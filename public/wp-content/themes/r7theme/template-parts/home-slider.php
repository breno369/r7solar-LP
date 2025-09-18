<?php
if (!isset($args['highlights_query']) || !is_a($args['highlights_query'], WP_Query::class)) {
    throw new InvalidArgumentException('The $highlights_query must be a WP_Query::class instance.');
}

$highlights_query = $args['highlights_query'];
?>

<?php if ($highlights_query->have_posts()): ?>
    <section class="slider">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php while ($highlights_query->have_posts()) : $highlights_query->the_post(); ?>
                    <article <?= esc_attr(post_class('swiper-slide')) ?>>
                        <picture>
                            <source media="(max-width: 1024px)" srcset="<?= esc_url(get_field('highlight_mobile_image')) ?>">
                            <img src="<?= esc_url(get_field('highlight_desktop_image')) ?>" alt="<?= esc_attr(get_the_title()) ?>">
                        </picture>

                        <div class="content">
                            <div class="inner">
                                <?php if (get_field('kicker')): ?>
                                    <span class="kicker" style="background-color: <?= esc_attr(get_field('kicker_background_color')) ?>; color: <?= esc_attr(get_field('kicker_text_color')) ?>;">
                                        <?= get_field('kicker') ?>
                                    </span>
                                <?php endif; ?>

                                <h2 class="title">
                                    <a href="<?= esc_url(get_the_permalink()) ?>" title="<?= esc_attr(get_the_title()) ?>" aria-label="Título da notícia">
                                        <?php the_title() ?>
                                    </a>
                                </h2>

                                <a class="cta" href="<?= esc_url(get_the_permalink()) ?>" title="<?= esc_attr(get_the_title()) ?>" aria-label="Ver mais sobre a notícia">
                                    Leia mais <i class="ph ph-caret-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
<?php endif; ?>