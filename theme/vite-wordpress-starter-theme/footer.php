<?php $f = get_field('footer', get_option('page_on_front')); ?>

<footer id="footer" class="footer">
  <div class="container">
    <div class="footer__wrapper">

      <div class="footer__top">

        <div class="footer__left">
          <?php if (!empty($f['contacts_heading'])): ?>
            <h2 class="footer__heading"><?php echo esc_html($f['contacts_heading']); ?></h2>
          <?php endif; ?>

          <div class="footer__contacts">

            <?php if (!empty($f['address_text'])): ?>
              <div class="footer__contact-item">
                <img src="<?php echo esc_url(get_theme_file_uri('static/img/icon-location.svg')); ?>" alt="" width="40" height="40">
                <p>
                  <?php echo nl2br(esc_html($f['address_text'])); ?>
                  <?php if (!empty($f['map_url'])): ?>
                    <a href="<?php echo esc_url($f['map_url']); ?>" target="_blank" rel="noopener" class="link--blue">Прокласти маршрут</a>
                  <?php endif; ?>
                </p>
              </div>
            <?php endif; ?>

            <?php if (!empty($f['email'])): ?>
              <div class="footer__contact-item footer__contact-item--center">
                <img src="<?php echo esc_url(get_theme_file_uri('static/img/icon-email.svg')); ?>" alt="" width="40" height="40">
                <a href="mailto:<?php echo esc_attr($f['email']); ?>" class="link--contact"><?php echo esc_html($f['email']); ?></a>
              </div>
            <?php endif; ?>

            //ACF Repeater for phones
            <?php if (!empty($f['phones'])): ?>
              <div class="footer__contact-item">
                <img src="<?php echo esc_url(get_theme_file_uri('static/img/icon-phone.svg')); ?>" alt="" width="40" height="40">
                <div class="footer__phones">
                  <?php foreach ($f['phones'] as $phone): ?>
                    <?php if (!empty($phone['phone'])): ?>
                      <a href="tel:<?php echo esc_attr(preg_replace('/[^\d+]/', '', $phone['phone'])); ?>" class="link--contact"><?php echo esc_html($phone['phone']); ?></a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>

        <div class="footer__right">
          <?php if (!empty($f['form_heading'])): ?>
            <h2 class="footer__heading footer__heading--center"><?php echo esc_html($f['form_heading']); ?></h2>
          <?php endif; ?>
          <?php echo do_shortcode('[contact-form-7 id="123" title="Footer Form"]'); ?>
        </div>

      </div>

      <?php if (!empty($f['map_image'])): $map = $f['map_image']; ?>
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