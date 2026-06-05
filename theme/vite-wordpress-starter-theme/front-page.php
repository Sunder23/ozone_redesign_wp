<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <main class="page">

      <?php
      $hero     = get_field('hero');
      $intro    = get_field('intro');
      $formats  = get_field('formats');
      $enjoy    = get_field('enjoy');
      $wellness = get_field('wellness');
      $tech     = get_field('tech');
      $floorplan = get_field('floorplan');
      $timeline = get_field('timeline');
      $gallery  = get_field('gallery');
      ?>

      <!-- ═══════════════════════════════════════════════════ SECTION 1 — HERO -->
      <?php if ($hero): ?>
        <section class="hero">
          <div class="hero__bg">
            <?php if (!empty($hero['bg_image'])): $img = $hero['bg_image']; ?>
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" aria-hidden="true">
            <?php endif; ?>
            <div class="overlay overlay--33"></div>
          </div>
          <div class="hero__content">
            <div class="container">
              <div class="hero__wrapper">
                <?php if (!empty($hero['title'])): ?>
                  <h1 class="hero__title"><?php echo esc_html($hero['title']); ?></h1>
                <?php endif; ?>
                <div class="header__nav">
                  <?php if (!empty($hero['nav_link'])): $nav = $hero['nav_link']; ?>
                    <a href="<?php echo esc_url($nav['url']); ?>"
                      class="btn--primary btn--lg"
                      <?php if ($nav['target']): ?>target="<?php echo esc_attr($nav['target']); ?>" <?php endif; ?>>
                      <?php echo esc_html($nav['title']); ?>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ══════════════════════════════════════════════════ SECTION 2 — INTRO -->
      <?php if ($intro): ?>
        <section class="intro">
          <div class="container">
            <div class="intro__wrapper">
              <div class="intro__tint"></div>

              <?php if (!empty($intro['text'])): ?>
                <div class="intro__text">
                  <?php echo wp_kses_post($intro['text']); ?>
                </div>
              <?php endif; ?>

              <?php $card = $intro['promo_card'] ?? [];
              if ($card): ?>
                <div class="promo-card">
                  <div class="promo-card__bg">
                    <?php if (!empty($card['bg_image'])): $img = $card['bg_image']; ?>
                      <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" aria-hidden="true">
                    <?php endif; ?>
                    <div class="overlay overlay--20"></div>
                  </div>

                  <?php if (!empty($card['title'])): ?>
                    <div class="promo-card__title">
                      <h2><?php echo esc_html($card['title']); ?></h2>
                    </div>
                  <?php endif; ?>

                  <?php if (!empty($card['features'])): ?>
                    <div class="promo-card__features">
                      <div class="promo-card__row">
                        <?php foreach ($card['features'] as $feature): ?>
                          <div class="promo-card__feature">
                            <?php if (!empty($feature['icon'])): $icon = $feature['icon']; ?>
                              <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="38" height="38">
                            <?php endif; ?>
                            <?php if (!empty($feature['text'])): ?>
                              <p><?php echo esc_html($feature['text']); ?></p>
                            <?php endif; ?>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ══════════════════════════════════════════════ SECTION 3 — FORMATS -->
      <?php if ($formats): ?>
        <section class="formats">
          <div class="container">
            <div class="formats__wrapper">

              <div class="formats__header">
                <?php if (!empty($formats['title'])): ?>
                  <h2><?php echo esc_html($formats['title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($formats['description'])): ?>
                  <?php echo wp_kses_post($formats['description']); ?>
                <?php endif; ?>
              </div>

              <?php if (!empty($formats['cards'])): ?>
                <div class="formats__cards">
                  <?php foreach ($formats['cards'] as $card): ?>
                    <div class="format-card">
                      <div class="format-card__bg">
                        <?php if (!empty($card['bg_image'])): $img = $card['bg_image']; ?>
                          <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                        <?php endif; ?>
                        <div class="overlay overlay--5"></div>
                      </div>
                      <div class="format-card__info">
                        <?php if (!empty($card['name'])): ?>
                          <h3><?php echo esc_html($card['name']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($card['size'])): ?>
                          <p><?php echo esc_html($card['size']); ?></p>
                        <?php endif; ?>
                      </div>
                      <button class="btn--arrow" aria-label="Детальніше">
                        <img src="<?php echo esc_url(get_theme_file_uri('static/img/icon-arrow.svg')); ?>" alt="" width="48" height="48" class="btn--arrow--img">
                      </button>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ════════════════════════════════════════════════ SECTION 4 — ENJOY -->
      <?php if ($enjoy): ?>
        <section class="enjoy">
          <?php if (!empty($enjoy['bg_image'])): $img = $enjoy['bg_image']; ?>
            <img class="enjoy__bg" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" aria-hidden="true">
          <?php endif; ?>
          <div class="overlay overlay--30"></div>
          <?php if (!empty($enjoy['title'])): ?>
            <h2><?php echo esc_html($enjoy['title']); ?></h2>
          <?php endif; ?>
          <div class="enjoy__cta">
            <button id="video_popup" class="btn--glass" <?php if (!empty($enjoy['video_url'])): ?> data-video-url="<?php echo esc_url($enjoy['video_url']); ?>" <?php endif; ?>>
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22C4.92487 22 0 17.0751 0 11C0 4.92487 4.92487 0 11 0ZM8.27051 6.02637C8.2159 5.99235 8.14615 5.99048 8.08984 6.02441C8.03512 6.05766 8 6.12122 8 6.18945V15.8105C8.00013 15.8795 8.03517 15.9414 8.08984 15.9746C8.14623 16.0095 8.21585 16.0076 8.27051 15.9727L15.9131 11.1621C15.9678 11.1289 16 11.0663 16 10.999C15.9999 10.9337 15.9676 10.8711 15.9131 10.8379L8.27051 6.02637Z" fill="white" />
              </svg>
              Відео-презентація
            </button>
          </div>
        </section>
      <?php endif; ?>

      <!-- ══════════════════════════════════════════════ SECTION 5 — WELLNESS -->
      <?php if ($wellness): ?>
        <section class="wellness">
          <div class="container">
            <div class="wellness__wrapper">
              <div class="wellness__header">
                <?php if (!empty($wellness['title'])): ?>
                  <h2><?php echo esc_html($wellness['title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($wellness['cta_link'])): $link = $wellness['cta_link']; ?>
                  <a href="<?php echo esc_url($link['url']); ?>"
                    class="btn--primary"
                    <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
                    <?php echo esc_html($link['title']); ?>
                  </a>
                <?php endif; ?>
              </div>

              <?php if (!empty($wellness['slides'])): ?>
                <div class="wellness__slider">
                  <?php foreach ($wellness['slides'] as $slide): ?>
                    <div class="wellness__slider__item">
                      <?php if (!empty($slide['image'])): $img = $slide['image']; ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                      <?php endif; ?>
                      <?php if (!empty($slide['label'])): ?>
                        <h3><?php echo esc_html($slide['label']); ?></h3>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ══════════════════════════════════════════════════ SECTION 6 — TECH -->
      <?php if ($tech): ?>
        <section class="tech">
          <div class="container">
            <div class="tech__wrapper">

              <?php if (!empty($tech['title'])): ?>
                <div class="tech__header">
                  <h2><?php echo esc_html($tech['title']); ?></h2>
                </div>
              <?php endif; ?>

              <?php if (!empty($tech['items'])): ?>
                <div class="tech__grid">
                  <div class="tech__title-panel tech__title-panel--left"><span>Технології, які працюють непомітно</span></div>
                  <div class="tech__title-panel tech__title-panel--right"><span>Технології, які працюють непомітно</span></div>
                  <div class="tech__bg">
                    <div class="tech__bg-fill"></div>
                    <?php if (!empty($tech['bg_image'])): $img = $tech['bg_image']; ?>
                      <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" aria-hidden="true">
                    <?php endif; ?>
                  </div>
                  <?php
                  $col_classes = ['tech__col--left', 'tech__col--middle', 'tech__col--right'];
                  foreach ($tech['items'] as $i => $item):
                    $col_class = $col_classes[$i] ?? 'tech__col--left';
                  ?>
                    <div class="tech__col <?php echo esc_attr($col_class); ?>">
                      <div class="tech__item">
                        <?php if (!empty($item['title'])): ?>
                          <h3><?php echo esc_html($item['title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($item['description'])): ?>
                          <p><?php echo esc_html($item['description']); ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ════════════════════════════════════════════ SECTION 7 — FLOOR PLAN -->
      <?php if ($floorplan): ?>
        <section id="plans" class="floorplan">
          <div class="container">
            <div class="floorplan__wrapper">

              <div class="floorplan__header">
                <?php if (!empty($floorplan['title'])): ?>
                  <h2><?php echo esc_html($floorplan['title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($floorplan['sections'])): ?>
                  <div class="floorplan__tabs">
                    <?php foreach ($floorplan['sections'] as $i => $section): ?>
                      <button class="floorplan__section-btn<?php echo $i === 0 ? ' floorplan__section-btn--active' : ''; ?>"
                        data-tab="<?php echo esc_attr($i); ?>">
                        <?php echo esc_html($section['label']); ?>
                      </button>
                      <?php if (count($section['slides']) > 1): ?>
                        <div class="floorplan__floors" data-floorplan="<?php echo esc_attr($i); ?>">
                          <?php foreach ($section['slides'] as $j => $slide): ?>
                            <button class="floorplan__floor<?php echo $j === 0 ? ' floorplan__floor--active' : ''; ?>"
                              data-slide="<?php echo esc_attr($j); ?>">
                              <?php echo $j === 0 ? '1&nbsp;поверх' : ($j + 1); ?>
                            </button>
                          <?php endforeach; ?>
                        </div>
                      <?php endif; ?>

                    <?php endforeach; ?>

                  </div>
                <?php endif; ?>
              </div>

              <?php if (!empty($floorplan['sections'])): ?>
                <div class="floorplan__panels">
                  <?php foreach ($floorplan['sections'] as $i => $section): ?>
                    <div class="floorplan__panel<?php echo $i === 0 ? ' is-active' : ''; ?>" data-tab="<?php echo esc_attr($i); ?>">
                      <?php
                      $slides = $section['slides'] ?? [];
                      if (!empty($slides)): ?>
                        <div class="swiper floorplan__swiper">
                          <div class="swiper-wrapper">
                            <?php foreach ($slides as $slide): ?>
                              <?php if (!empty($slide['image'])): $img = $slide['image']; ?>
                                <div class="swiper-slide">
                                  <div class="floorplan__image">
                                    <?php echo wp_get_attachment_image($img, 'full'); ?>
                                  </div>
                                </div>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </div>
                          <div class="swiper-pagination"></div>
                        </div>
                      <?php endif; ?>

                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ══════════════════════════════════════════════ SECTION 8 — TIMELINE -->
      <?php if ($timeline): ?>
        <section class="timeline">
          <div class="timeline__bg">
            <?php if (!empty($timeline['bg_image'])): $img = $timeline['bg_image']; ?>
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" aria-hidden="true">
            <?php endif; ?>
            <div class="overlay overlay--30"></div>
          </div>

          <div class="timeline__inner">
            <?php if (!empty($timeline['title'])): ?>
              <h2><?php echo esc_html($timeline['title']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($timeline['items'])): ?>
              <?php
              $items = $timeline['items'];
              $left_items  = [];
              $right_items = [];
              foreach ($items as $i => $item) {
                if ($i % 2 === 0) $left_items[]  = ['num' => $i + 1, 'text' => $item['text']];
                else               $right_items[] = ['num' => $i + 1, 'text' => $item['text']];
              }
              ?>
              <div class="timeline__wrap">
                <div class="timeline__grid">

                  <div class="timeline__col timeline__col--left">
                    <?php foreach ($left_items as $j => $item): ?>
                      <div class="timeline__item<?php echo ($item['num'] === count($items)) ? ' timeline__item--dim' : ''; ?>">
                        <ol start="<?php echo esc_attr($item['num']); ?>">
                          <li><?php echo esc_html($item['text']); ?></li>
                        </ol>
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <div class="timeline__center">
                    <div class="timeline__line"></div>
                    <?php foreach ($items as $i => $item): ?>
                      <div class="timeline__node<?php echo ($i === count($items) - 1) ? ' timeline__node--dim' : ''; ?>">
                        <?php echo esc_html($i + 1); ?>
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <div class="timeline__col timeline__col--right">
                    <?php foreach ($right_items as $item): ?>
                      <div class="timeline__item">
                        <ol start="<?php echo esc_attr($item['num']); ?>">
                          <li><?php echo esc_html($item['text']); ?></li>
                        </ol>
                      </div>
                    <?php endforeach; ?>
                  </div>

                </div>

                <?php if (!empty($timeline['description']) || !empty($timeline['builders_logo'])): ?>
                  <div class="timeline__desc">
                    <?php if (!empty($timeline['description'])): ?>
                      <?php echo wp_kses_post($timeline['description']); ?>
                    <?php endif; ?>
                    <?php if (!empty($timeline['builders_logo'])): $logo = $timeline['builders_logo']; ?>
                      <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="348" height="46">
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

          </div>
        </section>
      <?php endif; ?>

      <!-- ══════════════════════════════════════════════ SECTION 9 — GALLERY -->
      <?php if ($gallery): ?>
        <section class="gallery">
          <div class="gallery__tint"></div>
          <div class="container">
            <div class="gallery__wrapper">

              <?php if (!empty($gallery['title'])): ?>
                <div class="gallery__header">
                  <h2><?php echo esc_html($gallery['title']); ?></h2>
                </div>
              <?php endif; ?>

              <?php if (!empty($gallery['images'])): ?>
                <?php
                $images     = $gallery['images'];
                $mid        = (int) ceil(count($images) / 2);
                $top_row    = array_slice($images, 0, $mid);
                $bottom_row = array_slice($images, $mid);
                ?>
                <div class="gallery__grid">
                  <div class="gallery__row gallery__row--top">
                    <?php foreach ($top_row as $n => $row): ?>
                      <div class="gallery__item gallery__item--<?php echo esc_attr($n + 1); ?>">
                        <?php if (!empty($row['image'])): $img = $row['image']; ?>
                          <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                        <?php endif; ?>
                        <div class="gallery__item-tint"></div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <?php if ($bottom_row): ?>
                    <div class="gallery__row gallery__row--bottom">
                      <?php foreach ($bottom_row as $n => $row): ?>
                        <div class="gallery__item gallery__item--<?php echo esc_attr($n + $mid + 1); ?>">
                          <?php if (!empty($row['image'])): $img = $row['image']; ?>
                            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                          <?php endif; ?>
                          <div class="gallery__item-tint"></div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($gallery['text'])): ?>
                <div class="gallery__text">
                  <?php echo wp_kses_post($gallery['text']); ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </section>
      <?php endif; ?>

    </main>

    <!-- VIDEO POPUP -->
    <div id="modal-video" class="modal-video" role="dialog" aria-modal="true" aria-label="Відео">
      <div class="modal-video__container">
        <button class="modal-video__close" aria-label="Закрити">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="1" y1="1" x2="19" y2="19" stroke="white" stroke-width="2" stroke-linecap="round" />
            <line x1="19" y1="1" x2="1" y2="19" stroke="white" stroke-width="2" stroke-linecap="round" />
          </svg>
        </button>
        <div class="modal-video__inner"></div>
      </div>
    </div>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>