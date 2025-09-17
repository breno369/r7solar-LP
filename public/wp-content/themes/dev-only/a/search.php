<?php
// Template Name: Search
?>

<?php get_header(); ?>

<?php
global $wp_query;
$total_results = (int) $wp_query->found_posts;
?>

<main>
    <div class="container">
        <?php get_template_part('template-parts/ad', 'zone', ['slug' => 'main-top']); ?>
    </div>

    <div class="container">
        <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_top', 'class' => 'banner-top']); ?>
    </div>

    <div class="container">
        <?php get_template_part(slug: 'template-parts/breadcrumb', args: ['paths' => [['label' => 'Resultados para: ' . get_search_query()]]]); ?>
    </div>

    <div class="container default-layout">
        <div class="content">
            <div class="inner-content">
                <header class="content-header">
                    <h1>Resultados para: "<?= esc_html(get_search_query()) ?>"</h1>
                    <p>
                        <?php if ($total_results <= 0): ?>
                            Nenhum resultado encontrado para "<strong><?= esc_html(get_search_query()) ?></strong>"
                        <?php elseif ($total_results === 1): ?>
                            <?= esc_html($total_results) ?> resultado encontrado para "<strong><?= esc_html(get_search_query()) ?></strong>"
                        <?php else: ?>
                            <?= esc_html($total_results) ?> resultados encontrados para "<strong><?= esc_html(get_search_query()) ?></strong>"
                        <?php endif; ?>
                    </p>
                </header>

                <?php if (have_posts()): ?>
                    <ul class="results news">
                        <?php while (have_posts()) : the_post() ?>
                            <li class="item">
                                <a href="<?= esc_url(the_permalink()) ?>" title="<?= esc_attr(the_title()) ?>" aria-label="Ver sobre <?= esc_attr(the_title()) ?>">
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
                    </ul>

                    <?php if ($wp_query->max_num_pages > 1): ?>
                        <footer class="content-footer">
                            <?php the_posts_pagination([
                                'prev_text' => '<i class="ph ph-caret-left"></i><span>Anterior</span>',
                                'next_text' => '<span>Próximo</span><i class="ph ph-caret-right"></i>',
                            ]) ?>
                        </footer>
                    <?php endif ?>
                <?php else: ?>
                    <footer class="content-footer">
                        <p>Nenhum post encontrado.</p>
                    </footer>
                <?php endif ?>
            </div>

            <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_content_1', 'class' => 'banner-content-1']); ?>
            <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_content_2', 'class' => 'banner-content-2']); ?>
        </div>

        <?php get_sidebar(); ?>
    </div>

    <div class="container">
        <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_bottom', 'class' => 'banner-bottom']); ?>
    </div>
</main>

<?php get_footer(); ?>