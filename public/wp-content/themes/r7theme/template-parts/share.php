<?php
$link = empty($args['link']) ? get_the_permalink() : $args['link'];
?>

<section class="share">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $link ?>" target="_blank" class="link-share context-facebook" aria-label="Compartilhar no Facebook">
        <i class="ph ph-facebook-logo"></i>
    </a>

    <!-- <a href="https://twitter.com/intent/tweet?url=<?= $link ?>&text=Confira+esta+notícia!" target="_blank" class="link-share context-dark">
        <i class="ph ph-x-logo"></i>
    </a> -->

    <a href="https://wa.me/?text=<?= $link ?>" target="_blank" class="link-share context-whatsapp" aria-label="Compartilhar no Whatsapp">
        <i class="ph ph-whatsapp-logo"></i>
    </a>

    <!-- <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $link ?>" target="_blank" class="link-share context-linkedin">
        <i class="ph ph-linkedin-logo"></i>
    </a> -->

    <button
        class="shareable-button link-share context-dark link-share-mobile"
        data-title="<?= esc_attr(get_bloginfo('name')) ?>"
        data-text="Vi isso no Click Umuarama!"
        data-url="<?= esc_url($link) ?>">
        <i class="ph ph-share-network"></i>
    </button>

    <button class="link-share context-dark icon-chain copyable-button" data-copyable="<?= $link ?>">
        <div class="content-copy">
            <i class="ph ph-check"></i>
            <i class="ph ph-link icon-copy"></i>
        </div>
    </button>
</section>