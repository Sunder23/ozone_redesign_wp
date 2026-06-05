<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php
  $header = get_field('header', 'options');
  $phones = get_field('phones', 'options');
  ?>

  <header class="header">
    <div class="container">
      <div class="header_wrapper">

        <div class="header__contacts">
          <?php if (!empty($header['address'])): ?>
            <p><?php echo esc_html($header['address']); ?></p>
          <?php endif; ?>

          <?php if ($phones): ?>
            <?php foreach ($phones as $phone): ?>
              <?php if (!empty($phone['phone'])): ?>
                <?php $p = $phone['phone']; ?>
                <a href="<?php echo $p['url'] ?>" <?php if ($p['target']) echo 'target="_blank"'; ?>
                  class="header_phone"><?php echo esc_html($p['title']); ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <?php if ($header['logo']): ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <?php echo wp_get_attachment_image($header['logo'], 'full'); ?>
          </a>
        <?php endif; ?>

        <div class="header__nav">
          <?php if (!empty($header['nav_link'])): $nav = $header['nav_link']; ?>
            <a href="<?php echo esc_url($nav['url']); ?>"
              class="btn--outline-white"
              <?php if ($nav['target']): ?>target="<?php echo esc_attr($nav['target']); ?>" <?php endif; ?>>
              <?php echo esc_html($nav['title']); ?>
            </a>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </header>



  <header class="header_second">
    <div class="container">
      <div class="header_wrapper">
        <?php if ($header['second_logo']): ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <?php echo wp_get_attachment_image($header['second_logo'], 'full'); ?>
          </a>
        <?php endif; ?>
        <?php if (!empty($header['nav_link'])): $nav = $header['nav_link']; ?>
          <a href="<?php echo esc_url($nav['url']); ?>"
            class="btn--white"
            <?php if ($nav['target']): ?>target="<?php echo esc_attr($nav['target']); ?>" <?php endif; ?>>
            <?php echo esc_html($nav['title']); ?>
          </a>
        <?php endif; ?>

        <?php if (!empty($header['cta_link'])): $link = $header['cta_link']; ?>
          <a href="<?php echo esc_url($link['url']); ?>"
            class="btn--primary btn--lg"
            <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
            <?php echo esc_html($link['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </header>