<?php
if (!is_array($args['paths'])) {
    throw new InvalidArgumentException('Paths of the breadcrumb is missing.');
}

$paths = $args['paths'];
?>

<nav class="breadcrumb" aria-label="Breadcrumb">
    <ol itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?= esc_url(home_url()); ?>" itemprop="item" title="Página Inicial" aria-label="Página Inicial">
                <span itemprop="name">Início</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>

        <?php foreach ($paths as $key => $path): ?>
            <li><i class="ph ph-caret-right"></i></li>
            <?php if (empty($path['url'])): ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name"><?= esc_html($path['label']) ?></span>
                    <meta itemprop="position" content="<?= $key + 2 ?>" />
                </li>
            <?php else: ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<?= esc_url($path['url']) ?>" itemprop="item" title="<?= esc_attr($path['label']) ?>" aria-label="<?= esc_attr($path['label']) ?>">
                        <span itemprop="name"><?= esc_html($path['label']) ?></span>
                    </a>
                    <meta itemprop="position" content="<?= $key + 2 ?>" />
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ol>
</nav>