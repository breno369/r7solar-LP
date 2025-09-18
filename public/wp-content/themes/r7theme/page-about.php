<?php

// Template Name: Sobre Nós

?>

<?php get_header(); ?>

<main>
    <section class="main-banner">
        <div class="container-background-image">
            <img src="<?= esc_url(asset_img('bg-title-sobre-nos.webp')) ?>" alt="">
        </div>
        <div class="container-text">
            <h1 class="title-banner">Sobre nós</h1>
            <span class="text-banner">Conheça o portal de conteúdo feito para Umuarama.</span>
        </div>
    </section>

    <section class="container-mission">
        <div class="container-text">
            <h3 class="title-mission">nossa missão</h3>
            <p class="text">O Click Umuarama é o seu portal 100% local, sempre atualizado com as informações mais relevantes da cidade. Trazemos notícias, serviços, lugares e novidades que impactam diretamente a sua rotina.</p>
            <p class="text">Entregamos conteúdos de qualidade, com transparência, ética e credibilidade. Seja no smartphone, tablet ou computador, acreditamos que a informação local é fundamental para uma cidade mais conectada, engajada e consciente.</p>
        </div>
    </section>

    <section class="container-values">
        <h1 class="title-values">nossos valores</h1>
        <div class="container-cards-values">
            <div class="card-values">
                <span class="icon-card"><i class="ph ph-warning"></i></span>
                <h5 class="title-card">Transparência</h5>
                <p class="text-card">
                    Prezamos pela clareza em tudo o que publicamos. Queremos que você possa confiar no que está lendo. Se algo mudar, atualizamos. Se errarmos, corrigimos com responsabilidade, sempre com respeito a quem nos acompanha.
                </p>
            </div>
            <div class="card-values">
                <span class="icon-card"><i class="ph ph-scales"></i></span>
                <h5 class="title-card">Ética</h5>
                <p class="text-card">
                    Em um ambiente onde a velocidade da informação muitas vezes supera o cuidado com os fatos, escolhemos agir com responsabilidade. Não abrimos mão de critérios éticos em nenhuma etapa da produção do conteúdo.
                </p>
            </div>
            <div class="card-values">
                <span class="icon-card"><i class="ph ph-check-circle"></i></span>
                <h5 class="title-card">Credibilidade</h5>
                <p class="text-card">
                    Nosso compromisso é com a informação precisa, responsável e baseada em fontes confiáveis. Atuamos com rigor jornalístico, garantindo que cada notícia publicada reflita os fatos com clareza e imparcialidade.
                </p>
            </div>
        </div>
    </section>

    <section class="container-part">
        <div class="part-content">
            <h1 class="title-part">faça parte do click umuarama</h1>
            <p class="text-part">Quer sugerir uma pauta, anunciar no portal ou fazer parte da nossa equipe? Entre em contato conosco!</p>
            <div class="container-buttons-part">
                <a href="/fale-conosco" aria-label="Fale conosco" class="button-part">Fale Conosco</a>
                <a href="/anuncie" aria-label="Anuncie em nosso site" class="button-part">Anuncie</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>