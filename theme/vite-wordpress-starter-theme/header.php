<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php $header = get_field('header', 'options'); ?>

  <header class="header">
    <div class="container">
      <div class="header_wrapper">

        <div class="header__contacts">
          <?php if (!empty($header['address'])): ?>
            <p><?php echo esc_html($header['address']); ?></p>
          <?php endif; ?>
          <?php if (!empty($header['phone_1'])): ?>
            <p><?php echo esc_html($header['phone_1']); ?></p>
          <?php endif; ?>
          <?php if (!empty($header['phone_2'])): ?>
            <p><?php echo esc_html($header['phone_2']); ?></p>
          <?php endif; ?>
        </div>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
          <img class="logo__icon"
            src="<?php echo esc_url(get_theme_file_uri('assets/images/logo-icon.png')); ?>"
            alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
            width="44" height="44">
          <div class="logo__wordmark">
            <img class="logo__name"
              src="<?php echo esc_url(get_theme_file_uri('assets/images/logo-name.png')); ?>"
              alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
              width="116" height="28">
            <span class="logo__descriptor" aria-label="Residence">
              <span>R</span><span>e</span><span>s</span><span>i</span><span>d</span><span>e</span><span>n</span><span>c</span><span>e</span>
            </span>
          </div>
        </a>

        <div class="header__nav">
          <?php if (!empty($h['nav_link'])): $nav = $h['nav_link']; ?>
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