<?php
if (isset($args['slug']) === false) {
    throw new InvalidArgumentException('Slug of the zone is missing.');
}

$slug = $args['slug'];
$custom_css_class = $args['class'] ?? '';
$field = get_field($slug, 'option');
$creatives = isset($field['creatives']) && is_array($field['creatives']) ? $field['creatives'] : [];
$settings = isset($field['settings']) && is_array($field['settings']) ? $field['settings'] : [
    'fallback_duration' => '3000',
    'custom_order' => true,
    'sizes' => [
        'mobile_width' => 1080,
        'mobile_height' => 600,
        'desktop_width' => 1360,
        'desktop_height' => 190,
    ],
];

if (!function_exists('is_creative_valid')) {
    function is_creative_valid($creative)
    {
        if (!isset($creative['active'], $creative['dates']['begin'], $creative['dates']['end'])) {
            return false;
        }

        if (empty($creative['active'])) {
            return false;
        }

        $now = new DateTimeImmutable(timezone: new DateTimeZone('America/Sao_Paulo'));
        $begin = empty($creative['dates']['begin']) ? null : new DateTimeImmutable(datetime: $creative['dates']['begin'], timezone: new DateTimeZone('America/Sao_Paulo'));
        $end = empty($creative['dates']['end']) ? null : new DateTimeImmutable(datetime: $creative['dates']['end'], timezone: new DateTimeZone('America/Sao_Paulo'));
        
        if ($begin && $end) {
            return $begin <= $now && $end >= $now;
        }

        if ($begin) {
            return $begin <= $now;
        }

        if ($end) {
            return $end >= $now;
        }

        return true;
    }
}

$creatives = array_filter($creatives, 'is_creative_valid');

if (count($creatives) > 1 && $settings['custom_order'] === false) {
    shuffle($creatives);
}

$css_unique_class = 'banners-zone-' . uniqid();
$css_style = ".$css_unique_class>.wrapper{aspect-ratio:{$settings['sizes']['mobile_width']}/{$settings['sizes']['mobile_height']};}@media(min-width:1024px){.$css_unique_class>.wrapper{aspect-ratio:{$settings['sizes']['desktop_width']}/{$settings['sizes']['desktop_height']};}}";
?>

<?php if (count($creatives) > 0 && $settings['active']): ?>
    <section
        class="banners-zone <?= esc_attr("$css_unique_class $slug $custom_css_class") ?>"
        data-mobile-size="<?= esc_attr("{$settings['sizes']['mobile_width']}x{$settings['sizes']['mobile_height']}") ?>"
        data-desktop-size="<?= esc_attr("{$settings['sizes']['desktop_width']}x{$settings['sizes']['desktop_height']}") ?>">

        <div class="wrapper">
            <ul class="banners">
                <?php foreach ($creatives as $creative): ?>
                    <li
                        class="banner"
                        data-type="<?= esc_attr($creative['type']) ?>"
                        data-duration="<?= esc_attr(empty($creative['duration']) ? $settings['fallback_duration'] : $creative['duration']) ?>">

                        <?php if ($creative['type'] === 'image'): ?>
                            <a href="<?= esc_url($creative['link']['url']) ?>" title="<?= esc_attr($creative['title']) ?>" aria-label="<?= esc_attr($creative['title']) ?>" target="<?= $creative['link']['target_blank'] ? '_blank' : '_self' ?>">
                                <picture>
                                    <source media="(max-width: 1024px)" srcset="<?= esc_url($creative['mobile_image']) ?>">
                                    <img src="<?= esc_url($creative['desktop_image']) ?>" alt="<?= esc_attr($creative['title']) ?>" loading="lazy">
                                </picture>
                            </a>
                        <?php elseif ($creative['type'] === 'script'): ?>
                            <?= $creative['script'] ?>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </section>

    <style>
        <?= wp_strip_all_tags($css_style) ?>
    </style>
<?php endif ?>