<?php get_header(); ?>

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

<main>
    <section class="container-main">
        <div class="container-not-found">
            <h1 class="title-404">404</h1>
            <h3 class="title">Página não encontrada</h3>
            <p class="text">
                O conteúdo que você está procurando foi removido, renomeado ou está temporariamente indisponível.
            </p>
            <a class="link-home-back" href="<?= esc_url('/home') ?>" alt="Voltar a página inicial" title="Voltar a página inicial" aria-label="Voltar a página inicial">
                <i class="ph ph-house"></i>
                Página inicial
            </a>
        </div>
    </section>

    <?php if ($popular_query->have_posts()): ?>
        <section class="container-see-also">
            <div class="container-also">
                <h1 class="title">Últimas notícias</h1>
                <div class="content-see-also">
                    <?php while ($popular_query->have_posts()): $popular_query->the_post() ?>
                        <a href="<?= esc_url(get_permalink()) ?>" title="<?= esc_attr(get_the_title()) ?>" aria-label="Notícia <?= esc_attr(get_the_title()) ?>" class="see-also">
                            <div class="container-title">
                                <?php $terms = get_the_terms(get_the_ID(), 'category') ?>
                                <?php if (is_array($terms)): ?>
                                    <ul class="terms">
                                        <?php foreach ($terms as $term): ?>
                                            <li class="term">
                                                <span class="badge context-<?= esc_attr($term->slug) ?>"> <?= esc_html($term->name) ?></span>
                                            </li>
                                            <?php break; ?>
                                        <?php endforeach ?>
                                    </ul>
                                <?php endif ?>
                                <p class="title-post"><?= esc_html($post->post_title) ?></p>
                            </div>
                            <i class="ph ph-caret-right"></i>
                        </a>
                    <?php endwhile ?>
                    <?php wp_reset_postdata() ?>
                </div>
            </div>
        </section>
    <?php endif ?>
</main>

<?php get_footer(); ?>