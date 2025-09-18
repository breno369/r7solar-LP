<?php
// Template Name: Single Galeria
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post() ?>
        <?php
        $tags = get_the_tags();
        $categories = get_the_category();
        $categories_ids = wp_list_pluck($categories, 'term_id');

        $related_query = new WP_Query([
            'posts_per_page' => 3,
            'post_type' => 'post',
            'post__not_in' => [get_the_ID()],
            'category__in' => $categories_ids,
            'orderby' => 'date',
            'order' => 'desc',
            'has_password' => false,
        ]);
        ?>

        <main>
            <div class="container">
                <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_top', 'class' => 'banner-top']); ?>
            </div>

            <div class="container">
                <?php
                $paths = [];

                if (isset($categories[0])) {
                    $paths[] = ['label' => $categories[0]->name, 'url' => get_category_link($categories[0]->term_id)];
                }

                $paths[] = ['label' => get_the_title()];
                ?>

                <?php get_template_part(slug: 'template-parts/breadcrumb', args: ['paths' => $paths]); ?>
            </div>

            <div class="container default-layout">
                <div class="content">
                    <article <?php post_class('inner-content') ?>>
                        <header class="content-header">
                            <div class="title">
                                <h1><?php the_title() ?></h1>
                                <?php the_excerpt() ?>
                            </div>

                            <hr>

                            <div class="info">
                                <?php if (is_array($categories)): ?>
                                    <?php foreach ($categories as $category): ?>
                                        <a href="<?= esc_url(get_category_link($category->term_id)) ?>" title="Mais de <?= esc_attr($category->name) ?>" aria-label="Mais de <?= esc_attr($category->name) ?>">
                                            <small class="badge context-<?= esc_attr($category->slug) ?>">
                                                <?= $category->name ?>
                                            </small>
                                        </a>
                                    <?php endforeach ?>
                                <?php endif ?>

                                <p>
                                    <i class="ph ph-calendar-blank"></i>
                                    <span><?= get_field("coverage_date") ?></span>
                                </p>

                                <p>
                                    <i class="ph ph-map-pin"></i>
                                    <span><?= get_field("coverage_location") ?></span>
                                </p>

                                <p>
                                    <i class="ph ph-camera"></i>
                                    <span><?= get_field("coverage_photographer") ?></span>
                                </p>

                                <a class="whatsapp-link" href="<?= esc_url(get_field('link_whatsapp_group', 'option')) ?>" target="_blank" title="Participe do nosso grupo no WhatsApp" aria-label="Participe do nosso grupo no WhatsApp">
                                    <i class="ph ph-whatsapp-logo"></i>
                                    <span>Participe do nosso grupo no WhatsApp</span>
                                </a>

                                <div class="container-share">
                                    <span class="text">
                                        <i class="ph ph-share-fat"></i>
                                        Compartilhe
                                    </span>
                                    <?php get_template_part(slug: 'template-parts/share', args: ['link' => get_the_permalink()]); ?>
                                </div>
                            </div>
                        </header>

                        <div class="the-content">
                            <?php the_content() ?>
                        </div>

                        <footer class="content-footer">
                            <?php if (is_array($tags)): ?>
                                <ul class="tags">
                                    <p>
                                        <i class="ph ph-tag"></i>
                                    </p>

                                    <?php foreach ($tags as $tag): ?>
                                        <li>
                                            <a href="<?= esc_url(get_tag_link($tag->term_id)) ?>" title="Ver mais sobre <?= esc_attr($tag->name) ?>" aria-label="Ver mais sobre <?= esc_attr($tag->name) ?>">
                                                <span><?= esc_html($tag->name) ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>

                            <?php get_template_part(slug: 'template-parts/share', args: ['link' => get_the_permalink()]); ?>
                        </footer>
                    </article>

                    <?php if ($related_query->have_posts()): ?>
                        <section class="related-posts">
                            <h2>Veja também</h2>
                            <ul class="news">
                                <?php while ($related_query->have_posts()): $related_query->the_post() ?>
                                    <li class="item">
                                        <a href="<?= esc_url(the_permalink()) ?>" title="<? esc_attr(the_title()) ?>" aria-label="<? esc_attr(the_title()) ?>">
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
                        </section>
                    <?php endif ?>

                    <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_content_1', 'class' => 'banner-content-1']); ?>
                    <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_content_2', 'class' => 'banner-content-2']); ?>
                </div>

                <?php get_sidebar(); ?>
            </div>

            <div class="container">
                <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_top', 'class' => 'banner-bottom']); ?>
            </div>
        </main>
    <?php endwhile ?>
<?php endif ?>

<?php get_footer(); ?>