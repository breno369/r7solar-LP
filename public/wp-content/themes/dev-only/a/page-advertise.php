<?php

// Template Name: Anuncie

?>

<?php get_header(); ?>

<main>
    <section class="main-banner">
        <div class="container-background-image">
            <picture>
                <source media="(min-width:768px)" srcset="<?= esc_url(asset_img('bg-title-anuncie-desktop.webp')) ?>">
                <img src="<?= esc_url(asset_img('bg-title-anuncie-mobile.webp')) ?>" alt="Imagem de fundo da pagina anuncie">
            </picture>
        </div>
        <div class="container-text">
            <h1 class="title-banner">anuncie</h1>
            <span class="text-banner">Amplifique sua marca em Umuarama e transforme audiência em resultados.</span>
        </div>
    </section>

    <section class="container-advertising">
        <div class="container-advertising-text">
            <h3 class="title-advertising">soluções para sua marca</h3>
            <p class="text-advertising">No Click Umuarama, oferecemos soluções que vão além da publicidade on-line tradicional, utilizamos estratégias que geram engajamento e autoridade para a sua marca.</p>
            <p class="text-advertising">Com conteúdos próprios e recursos multimídia, criamos pautas personalizadas para promover seu negócio de forma relevante. Anuncie conosco e amplifique sua presença em Umuarama.</p>
            <a href="/fale-conosco" aria-label="Fale conosco" class="link-advertising">
                Fale com a nossa equipe
                <!-- <i class="ph ph-arrow-right"></i> -->
                <i class="ph ph-arrow-right"></i>
            </a>
        </div>
    </section>

    <section class="container-advertising-reasons">
        <div class="content-advertising-reasons">
            <div class="header-reasons">
                <h2 class="title-reasons">Por que anunciar conosco?</h2>
                <span class="subtitle-reasons">Descubra como o Click Umuarama pode impulsionar seu negócio e conectá-lo ao público local.</span>
            </div>
            <div class="content-reasons">
                <div class="block-reason">
                    <div class="container-icon">
                        <span class="icon-reason">
                            <i class="ph ph-target"></i>
                        </span>
                    </div>
                    <div class="content-text">
                        <h3 class="title">Audiência local qualificada</h3>
                        <p class="text">Fale diretamente com um público que vive, consome e se interessa pelo que acontece em Umuarama. A visibilidade do seu negócio alcança pessoas com alto potencial de conversão.</p>
                    </div>
                </div>
                <div class="block-reason">
                    <div class="container-icon">
                        <span class="icon-reason">
                            <i class="ph ph-trend-up"></i>
                        </span>
                    </div>
                    <div class="content-text">
                        <h3 class="title">Credibilidade e autoridade</h3>
                        <p class="text">Ao anunciar conosco, sua marca se associa a um portal reconhecido pela seriedade, imparcialidade e confiança. Fortaleça sua imagem ao lado de um veículo feito para Umuarama.</p>
                    </div>
                </div>
                <div class="block-reason">
                    <div class="container-icon">
                        <span class="icon-reason">
                            <i class="ph ph-currency-dollar"></i>
                        </span>
                    </div>
                    <div class="content-text">
                        <h3 class="title">Custo-benefício</h3>
                        <p class="text">Oferecemos soluções com formatos variados e flexíveis. Aqui, cada investimento em mídia é pensado para gerar retorno, visibilidade e autoridade.</p>
                    </div>
                </div>
                <div class="block-reason">
                    <div class="container-icon">
                        <span class="icon-reason">
                            <i class="ph ph-users"></i>
                        </span>
                    </div>
                    <div class="content-text">
                        <h3 class="title">Múltiplos canais</h3>
                        <p class="text">Sua marca em destaque no portal, redes sociais e conteúdos especiais — ampliando o alcance, fortalecendo a presença digital e gerando mais engajamento.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-part">
        <div class="part-content">
            <h1 class="title-part">pronto para começar?</h1>
            <p class="text-part">Entre em contato com a nossa equipe e descubra como podemos impulsionar o seu negócio.</p>
            <a href="/fale-conosco" aria-label="Fale com nossa equipe" class="button-part">
                Fale com a nossa equipe
                <!-- <i class="ph ph-arrow-right"></i> -->
                <i class="ph ph-arrow-right"></i>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>