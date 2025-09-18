<?php
// Template Name: Single Protected
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post() ?>
        <main>
            <div class="container">
                <section class="container-page-post-protected">
                    <section class="container-post-protected">
                        <div class="container-form-post-protected">
                            <div class="container-icon">
                                <span class="icon">
                                    <i class="ph ph-lock"></i>
                                </span>
                            </div>
                            <div class="container-title">
                                <h2 class="title">Conteúdo protegido</h2>
                                <span class="subtitle">A matéria está em processo de revisão ou aguarda aprovação do patrocinador antes da publicação.</span>
                            </div>
                            <form class="form" action="/wp-login.php?action=postpass" method="post">
                                <input type="hidden" name="redirect_to" value="<?= esc_attr(the_permalink()) ?>" />
                                <div>
                                    <label class="label-password" for="pwbox-135">Senha para visualizar a prévia do conteúdo:</label>
                                    <div class="container-input">
                                        <input class="post-password" name="post_password" id="pwbox-135" type="password" spellcheck="false" required size="20" placeholder=" Digite a senha fornecida por nossa equipe." />
                                        <button type="button" class="show-password">
                                            <i class="ph ph-eye"></i>
                                            <i class="ph ph-eye-closed" style="display: none;"></i>
                                        </button>
                                    </div>
                                    <span class="subtext">A senha foi enviada via WhatsApp.</span>
                                </div>
                                <button class="button" type="submit" name="Submit">
                                    <i class="ph ph-file-text"></i>
                                    Acessar conteúdo
                                </button>
                            </form>
                        </div>
                        <div class="container-card">
                            <h2 class="title-card">Não recebeu a senha?</h2>
                            <span class="subtitle-card">Entre em contato para recebê-la agora mesmo.</span>
                            <a class="link-card" href="<?= esc_url(get_field('link_whatsapp', 'options')) ?>" target="_blank" title="Link contato equipe editorial" aria-label="Link contato equipe editorial">
                                <i class="ph ph-chat-circle"></i>
                                Contatar Equipe Editorial
                            </a>
                            <div class="divisor-line">
                                <span class="text-info">Equipe Editorial: Segunda a Sexta, 8h às 18h</span>
                                <span class="text-info">Resposta imediata durante horário comercial</span>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </main>
    <?php endwhile ?>
<?php endif ?>

<?php get_footer(); ?>