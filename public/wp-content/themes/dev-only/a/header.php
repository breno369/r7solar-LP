<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?= esc_attr(get_bloginfo('charset')) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <link rel="icon" href="<?= esc_url(asset_img('/favicon.svg')) ?>">
    <link rel="icon" href="<?= esc_url(asset_img('/favicon-filled.png')) ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header">
        <section>
            <div class="container inner">
                <nav class="institutional">
                    <?php wp_nav_menu([
                        'theme_location' => 'header_institutional',
                        'container' => false,
                        'depth' => 1,
                    ]) ?>
                </nav>

                <nav class="social-link">
                    <ul>
                        <li>
                            <a class="whatsapp-link" href="<?= esc_url(get_field('link_whatsapp_group', 'option')) ?>" target="_blank" title="Participe do nosso grupo no WhatsApp" aria-label="Participe do nosso grupo no WhatsApp">
                                <i class="ph ph-whatsapp-logo"></i>
                                <span>Participe do nosso grupo no WhatsApp</span>
                            </a>
                        </li>
                        <li>
                            <a class="icon-link" href="<?= esc_url(get_field('link_instagram', 'option')) ?>" target="_blank" title="Perfil no Instagram" aria-label="Perfil no Instagram">
                                <i class="ph ph-instagram-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a class="icon-link" href="<?= esc_url(get_field('link_tiktok', 'option')) ?>" target="_blank" title="Conta do TikTok" aria-label="Conta do TikTok">
                                <i class="ph ph-tiktok-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a class="icon-link" href="<?= esc_url(get_field('link_facebook', 'option')) ?>" target="_blank" title="Página do Facebook" aria-label="Página do Facebook">
                                <i class="ph ph-facebook-logo"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>

        <section>
            <div class="container inner">
                <h1 class="logo">
                    <a href="<?= esc_url(home_url()); ?>" title="Página Inicial" aria-label="Página inicial">
                        <img src="<?= esc_url(asset_img('/new-logo-black.svg')) ?>" alt="Logo <?= esc_attr(get_bloginfo('name')) ?>">
                    </a>
                </h1>

                <div id="search-form-container" class="categories">
                    <nav class="nav-categories">
                        <?php wp_nav_menu([
                            'theme_location' => 'header_categories',
                            'container' => false,
                            'depth' => 1,
                        ]) ?>
                    </nav>

                    <form role="search" class="search-form" method="get" action="/">
                        <div class="inner">
                            <input name="s" id=" input-search" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                            <button type="sumbmit" aria-label="Enviar">
                                <i class="ph ph-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <button type="button" aria-label="Abrir menu" class="toggle-mobile-menu">
                    <i class="ph ph-list"></i>
                </button>
            </div>
        </section>
    </header>

    <div id="mobile-menu" class="mobile-menu">
        <div class="header">
            <div class="header-title">
                <h1>Menu</h1>
                <button type="button" class="toggle-mobile-menu" aria-label="Fechar menu">
                    <i class="ph ph-x"></i>
                </button>
            </div>
        </div>
        <div class="container-search">
            <form role="search" class="search-form" method="get" action="/">
                <div class="inner">
                    <input name="s" id=" input-search" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button type="submit" aria-label="Enviar">
                        <i class="ph ph-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="body">
            <nav class="institutional">
                <h2>Institucional</h2>
                <?php wp_nav_menu([
                    'theme_location' => 'header_institutional',
                    'container' => false,
                    'depth' => 1,
                ]) ?>
            </nav>

            <nav class="categories">
                <h2>Editorias</h2>
                <?php wp_nav_menu([
                    'theme_location' => 'header_categories',
                    'container' => false,
                    'depth' => 1,
                ]) ?>
            </nav>

            <nav class="social-links">
                <h2>Redes Sociais</h2>
                <ul>
                    <li>
                        <a class="icon-link" href="<?= esc_url(get_field('link_instagram', 'option')) ?>" target="_blank" title="Perfil no Instagram" aria-label="Perfil no Instagram">
                            <i class="ph ph-instagram-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a class="icon-link" href="<?= esc_url(get_field('link_tiktok', 'option')) ?>" target="_blank" title="Conta do TikTok" aria-label="Conta do TikTok">
                            <i class="ph ph-tiktok-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a class="icon-link" href="<?= esc_url(get_field('link_facebook', 'option')) ?>" target="_blank" title="Página do Facebook" aria-label="Página do Facebook">
                            <i class="ph ph-facebook-logo"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>