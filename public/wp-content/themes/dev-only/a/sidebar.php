<?php
$results = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT 
            p.ID,
            SUM(pv.count) as views
        FROM {$wpdb->prefix}posts p
        INNER JOIN {$wpdb->prefix}post_views pv ON p.ID = pv.id
        WHERE p.post_type = 'post'
            AND p.post_password = ''
            AND p.post_status = 'publish'
            AND pv.period >= %d
        GROUP BY p.ID
        ORDER BY views DESC
        LIMIT 5",
        date('Ymd', strtotime('-7 days'))
    )
);

$post_ids = wp_list_pluck($results, 'ID');

$popular_query = new WP_Query([
    'post_type' => 'post',
    'post__in' => $post_ids,
    'orderby' => 'post__in',
    'posts_per_page' => -1
]);
?>

<aside class="sidebar">
    <div class="inner-sidebar">
        <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_sidebar_1', 'class' => 'banner-sidebar-1']); ?>

        <?php if ($popular_query->have_posts()): ?>
            <div class="popular-news">
                <h2>Mais lidas da semana</h2>
                <ul>
                    <?php while ($popular_query->have_posts()): $popular_query->the_post() ?>
                        <li>
                            <a href="<?= esc_url(get_permalink()) ?>" title="<?= esc_attr(the_title()) ?>" aria-label="<?= esc_attr(the_title()) ?>">
                                <article <?php post_class(); ?>>
                                    <figure>
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail(size: 'medium', attr: ['alt' => get_the_title(), 'loading' => 'lazy']) ?>
                                        <?php else: ?>
                                            <img src="<?= esc_url(asset_img('placeholder.svg')) ?>" alt="<?= esc_attr(the_title()) ?>" loading="lazy">
                                        <?php endif; ?>
                                    </figure>

                                    <div class="data">
                                        <p>
                                            <?php if (get_field('kicker')): ?>
                                                <?= get_field('kicker') ?>
                                                <i class="ph ph-dot"></i>
                                            <?php endif; ?>
                                            <?= get_the_human_date() ?>
                                        </p>

                                        <h3>
                                            <?php the_title() ?>
                                        </h3>
                                    </div>
                                </article>
                            </a>
                        </li>
                    <?php endwhile ?>
                    <?php wp_reset_postdata() ?>
                </ul>
            </div>
        <?php endif ?>

        <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_sidebar_2', 'class' => 'banner-sidebar-2']); ?>
    </div>
</aside>