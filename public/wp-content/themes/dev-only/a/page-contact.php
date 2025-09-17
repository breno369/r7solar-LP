<?php

// Template Name: Fale Conosco

?>

<?php get_header(); ?>

<main>
    <section class="main-banner">
        <div class="container-background-image">
            <picture>
                <source media="(min-width:768px)" srcset="<?= esc_url(asset_img('bg-title-fale-conosco-desktop-v2.webp')) ?>">
                <img src="<?= esc_url(asset_img('bg-title-fale-conosco-mobile-v2.webp')) ?>" alt="Imagem de fundo da pagina fale conosco">
            </picture>
        </div>
        <div class="container-text">
            <h1 class="title-banner">Fale conosco</h1>
            <span class="text-banner">Queremos ouvir você! Seja para elogios, sugestões, críticas ou dúvidas, estamos aqui para te ajudar.</span>
        </div>
    </section>

    <section class="container-contact-us">
        <div class="container-contact">
            <div class="content-contact">
                <div class="block-contact">
                    <span class="icon-contact">
                        <i class="ph ph-envelope-simple"></i>
                    </span>
                    <h4 class="title-contact">E-mail</h4>
                    <span class="text-contact">Responderemos em até 24 horas úteis.</span>
                    <a href="mailto:contato@clickumuarama.com.br" target="_blank" aria-label="Entre em contato pelo nosso email" class="link-contact">contato@clickumuarama.com.br</a>
                </div>
                <div class="block-contact">
                    <span class="icon-contact">
                        <i class="ph ph-phone"></i>
                    </span>
                    <h4 class="title-contact">Telefone</h4>
                    <span class="text-contact">De segunda à sexta-feira, das 08h às 12h e das 14h às 18h.</span>
                    <a href="tel:(44)-9965-4507" aria-label="Entre em contato pelo nosso telefone" class="link-contact">(44) 9 9965-4507</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-form-contact">
        <div class="content-form-contact">
            <div class="content-form">
                <div class="container-title">
                    <h2 class="title">Envie sua mensagem</h2>
                    <span class="subtitle">Preencha o formulário abaixo e entraremos em contato o mais breve possível.</span>
                </div>
                <div class="container-form">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    </section>

    <section class="container-frequently-asked">
        <div class="content-frequently-asked">
            <div class="container-asked">
                <div class="container-title-asked">
                    <h2 class="title-asked">Perguntas frequentes</h2>
                    <span class="subtitle-asked">Encontre respostas para as dúvidas mais comuns sobre o Click Umuarama.</span>
                </div>
                <div class="content-asked">
                    <?php if (have_rows('fequently_asked')) : ?>
                        <?php while (have_rows('fequently_asked')) : the_row() ?>
                            <div class="question">
                                <button class="btn-question">
                                    <h3 class="btn-text">
                                        <?php the_sub_field('question') ?>
                                    </h3>
                                    <i class="ph ph-caret-down"></i>
                                </button>
                                <div class="content-question-answer">
                                    <p class="question-answer">
                                        <?php the_sub_field('answer') ?>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>