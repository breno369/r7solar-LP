<?php
// Template Name: Página Inicial
?>

<?php get_header(); ?>

<?php
$highlights_query = new WP_Query([
    'posts_per_page' => 3,
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'desc',
    'meta_key' => 'highlight',
    'meta_value' => true,
    'has_password' => false,
]);
$highlights_ids = wp_list_pluck($highlights_query->posts, 'ID');

$latest_news_query = new WP_Query([
    'posts_per_page' => 6,
    'post_type' => 'post',
    'post_status' => 'publish',
    'post__not_in' => [...$highlights_ids],
    'orderby' => 'date',
    'order' => 'desc',
    'has_password' => false,
    'category__not_in' => [get_cat_ID('galerias')],
]);
$latest_news_ids = wp_list_pluck($latest_news_query->posts, 'ID');

$cidade_news_query = new WP_Query([
    'category_name' => 'cidade',
    'posts_per_page' => 6,
    'post_type' => 'post',
    'post_status' => 'publish',
    'post__not_in' => [...$highlights_ids, ...$latest_news_ids],
    'orderby' => 'date',
    'order' => 'desc',
    'has_password' => false,
]);
$cidade_news_ids = wp_list_pluck($cidade_news_query->posts, 'ID');

$galerias_query = new WP_Query([
    'category_name' => 'galerias',
    'posts_per_page' => 6,
    'post_type' => 'post',
    'post_status' => 'publish',
    'post__not_in' => [...$highlights_ids],
    'orderby' => 'date',
    'order' => 'desc',
    'has_password' => false,
]);
$galerias_ids = wp_list_pluck($galerias_query->posts, 'ID');
?>

<main>
    <?php get_template_part('template-parts/home', 'slider', ['highlights_query' => $highlights_query]); ?>

    <div class="container">
        <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_top', 'class' => 'banner-top']); ?>
    </div>

    <div class="container default-layout">
        <div class="content">
            <div class="inner-content">
                <?php get_template_part('template-parts/home', 'latest-news', ['latest_news_query' => $latest_news_query]); ?>

                <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_content_1', 'class' => 'banner-content-1']); ?>

                <?php get_template_part('template-parts/home', 'cidade', ['cidade_news_query' => $cidade_news_query]); ?>

                <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_content_2', 'class' => 'banner-content-2']); ?>

                <?php get_template_part('template-parts/home', 'galerias', ['galerias_query' => $galerias_query]); ?>
            </div>
        </div>

        <?php get_sidebar(); ?>
    </div>

    <div class="container">
        <?php get_template_part('template-parts/ads', 'zone', ['slug' => 'zone_bottom', 'class' => 'banner-bottom']); ?>
    </div>

    <div class="container">
        <?php get_template_part('template-parts/home', 'videos'); ?>
    </div>
</main>

<?php get_footer(); ?>