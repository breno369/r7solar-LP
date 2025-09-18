<?php
// Template Name: Videos Archive
?>

<?php get_header(); ?>

<?php
$videos = get_queried_object();
?>

<main>
    <div class="container">
        <?php get_template_part('template-parts/ad', 'zone', ['slug' => 'main-top']); ?>
    </div>

    <div class="container">
        <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_top', 'class' => 'banner-top']); ?>
    </div>

    <div class="container">
        <?php get_template_part(slug: 'template-parts/breadcrumb', args: ['paths' => [['label' => $videos->label]]]); ?>
    </div>

    <div class="container default-layout">
        <div class="content">
            <div class="inner-content">
                <header class="content-header">
                    <h1><?= esc_html($videos->label) ?></h1>
                    <?php if (!empty($videos->description)): ?>
                        <p><?= esc_html($videos->description) ?></p>
                    <?php endif ?>
                </header>

                <?php if (have_posts()): ?>
                    <ul class="results videos">
                        <?php while (have_posts()): the_post() ?>
                            <li class="item">
                                <a href="<?= esc_url(get_field('post_url')) ?>" title="<?= esc_attr(the_title()) ?>" aria-label="Ver mais sobre <?= esc_attr(the_title()) ?>">
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

                                        <div class="effect">
                                            <i class="ph ph-play"></i>
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
                        <p><?= $videos->labels->not_found ?></p>
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