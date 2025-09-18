<footer id="footer">
    <div class="container">
        <section class="content">
            <figure class="logo">
                <img src="<?= esc_url(asset_img('short-logo-white.svg')) ?>" alt="Logo Click Umuarama">
                <figcaption><?= esc_html(bloginfo('description')) ?></figcaption>
            </figure>

            <nav class="categories">
                <h3>Editorias</h3>
                <?php wp_nav_menu([
                    'theme_location' => 'footer_categories',
                    'container' => false,
                    'depth' => 1,
                ]) ?>
            </nav>

            <nav class="institutional">
                <h3>Links Rápidos</h3>
                <?php wp_nav_menu([
                    'theme_location' => 'footer_institutional',
                    'container' => false,
                    'depth' => 1,
                ]) ?>
            </nav>

            <nav class="social-links">
                <h3>Redes Sociais</h3>
                <ul>
                    <li>
                        <a href="<?= esc_url(get_field('link_instagram', 'option')) ?>" target="_blank" aria-label="Perfil no Instagram">
                            <i class="ph ph-instagram-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= esc_url(get_field('link_tiktok', 'option')) ?>" target="_blank" aria-label="Conta do TikTok">
                            <i class="ph ph-tiktok-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= esc_url(get_field('link_facebook', 'option')) ?>" target="_blank" aria-label="Página do Facebook">
                            <i class="ph ph-facebook-logo"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
    </div>

    <div class="container">
        <hr>
    </div>

    <div class="container">
        <section class="legal-info">
            <div class="copyright">
                <p>&copy; 2025 Click Umuarama. Todos os direitos reservados.</p>
            </div>

            <div class="developer">
                <a href="https://www.agenciaecode.com.br/" target="_blank" title="Desenvolvido por e/code" aria-label="Desenvolvido por e/code">
                    <small>Desenvolvido por</small>
                    <img src="https://www.agenciaecode.com.br/img/logo.svg" alt="Logo e/code">
                </a>
            </div>
        </section>
    </div>

</footer>

<?php wp_footer(); ?>

</body>

</html>