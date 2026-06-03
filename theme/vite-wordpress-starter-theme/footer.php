<?php
$footer = get_field('footer', 'options');
$phones = get_field('phones', 'options');
?>

<footer id="footer" class="footer">
  <div class="container">
    <div class="footer__wrapper">

      <div class="footer__top">

        <div class="footer__left">
          <?php if (!empty($footer['contacts_heading'])): ?>
            <h2 class="footer__heading"><?php echo esc_html($footer['contacts_heading']); ?></h2>
          <?php endif; ?>

          <div class="footer__contacts">

            <?php if (!empty($footer['address_text'])): ?>
              <div class="footer__contact-item">
                <img src="<?php echo esc_url(get_theme_file_uri('static/img/icon-location.svg')); ?>" alt="" width="40" height="40">
                <p>
                  <?php echo wp_strip_all_tags($footer['address_text']) ?>
                  <?php if (!empty($footer['map_url'])): ?>
                    <a href="<?php echo esc_url($footer['map_url']); ?>" target="_blank" rel="noopener" class="link--blue">Прокласти маршрут</a>
                  <?php endif; ?>
                </p>
              </div>
            <?php endif; ?>

            <?php if (!empty($footer['email'])): ?>
              <div class="footer__contact-item footer__contact-item--center">
                <img src="<?php echo esc_url(get_theme_file_uri('static/img/icon-email.svg')); ?>" alt="" width="40" height="40">
                <a href="mailto:<?php echo esc_attr($footer['email']); ?>" class="link--contact"><?php echo esc_html($footer['email']); ?></a>
              </div>
            <?php endif; ?>


            <?php if (!empty($phones)): ?>
              <div class="footer__contact-item">
                <img src="<?php echo esc_url(get_theme_file_uri('static/img/icon-phone.svg')); ?>" alt="" width="40" height="40">
                <div class="footer__phones">
                  <?php foreach ($phones as $phone): ?>
                    <?php $p = $phone['phone']; ?>
                    <a href="<?php echo $p['url'] ?>" <?php if ($p['target']) echo 'target="_blank"'; ?>
                      class="link--contact"><?php echo esc_html($p['title']); ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>

        <div class="footer__right">
          <?php if (!empty($footer['form_heading'])): ?>
            <h2 class="footer__heading footer__heading--center"><?php echo esc_html($footer['form_heading']); ?></h2>
          <?php endif; ?>
          <?php echo do_shortcode('[contact-form-7 id="123" title="Footer Form" html_class="form"]'); ?>
        </div>

      </div>

      <?php if (!empty($footer['map_image'])): $map = $footer['map_image']; ?>
        <div class="footer__map">
          <img src="<?php echo esc_url($map['url']); ?>" alt="<?php echo esc_attr($map['alt']); ?>">
        </div>
      <?php endif; ?>

    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>