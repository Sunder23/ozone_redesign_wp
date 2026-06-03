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
          <?php if (!empty($hero['cta_link'])): $link = $hero['cta_link']; ?>
            <a href="<?php echo esc_url($link['url']); ?>"
              class="btn--primary btn--lg"
              <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>"<?php endif; ?>>
              <?php echo esc_html($link['title']); ?>
            </a>
          <?php endif; ?>
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

        <?php $card = $intro['promo_card'] ?? []; if ($card): ?>
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
                  <img src="<?php echo esc_url(get_theme_file_uri('assets/images/icon-arrow.svg')); ?>" alt="" width="48" height="48">
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
      <button class="btn--glass"<?php if (!empty($enjoy['video_url'])): ?> data-video-url="<?php echo esc_url($enjoy['video_url']); ?>"<?php endif; ?>>
        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/icon-play.svg')); ?>" alt="" width="22" height="22">
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
              <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>"<?php endif; ?>>
              <?php echo esc_html($link['title']); ?>
            </a>
          <?php endif; ?>
        </div>

        <?php if (!empty($wellness['slides'])): ?>
          <div class="wellness__slider">
            <?php foreach ($wellness['slides'] as $slide): ?>
              <?php if (!empty($slide['image'])): $img = $slide['image']; ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
              <?php endif; ?>
              <?php if (!empty($slide['label'])): ?>
                <h3><?php echo esc_html($slide['label']); ?></h3>
              <?php endif; ?>
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
  <section id="s7" class="floorplan">
    <div class="container">
      <div class="floorplan__wrapper">
        <div class="floorplan__header">
          <?php if (!empty($floorplan['title'])): ?>
            <h2><?php echo esc_html($floorplan['title']); ?></h2>
          <?php endif; ?>
          <div class="floorplan__tabs">
            <div class="floorplan__section-group" id="groupA">
              <button class="floorplan__section-btn floorplan__section-btn--active" data-section="A">Секція А (вид на море)</button>
              <div class="floorplan__floors" id="floorsA">
                <button class="floorplan__floor floorplan__floor--active">1&nbsp;поверх</button>
                <button class="floorplan__floor">2</button>
                <button class="floorplan__floor">3</button>
                <button class="floorplan__floor">4</button>
              </div>
            </div>
            <button class="floorplan__section-btn" data-section="B">Секція B (вид на парк)</button>
          </div>
        </div>
        <div class="floorplan__slider">
          <?php if (!empty($floorplan['floor_plan_image'])): $img = $floorplan['floor_plan_image']; ?>
            <div class="floorplan__image">
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
            </div>
          <?php endif; ?>
        </div>
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

<?php endwhile; endif; ?>

<?php get_footer(); ?>
