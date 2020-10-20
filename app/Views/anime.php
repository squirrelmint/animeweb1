<section id="anime-banners" class="bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 ">
        <img class="banners" src="https://gurubac.com//images/banner.jpg?692d2df5f9f9837e6112a0e772232da7">
      </div>
    </div>
  </div>
</section>

<!-- Icons Grid -->
<section id="anime-video" class="bg-dark text-center">
  <div class="container">
    <div class="row">
      <?php if (substr($data_anime['movie_picture'], 0, 4) == 'http') {
        $movie_picture = $data_anime['movie_picture'];
      } else {
        $movie_picture = $path_thumbnail . $data_anime['movie_picture'];
      }
      $url_name = urlencode(str_replace(' ','-',$data_anime['movie_thname']))
      ?>
      <div id="anime-player">
        <iframe id="player" class="player" src="<?= base_url('player/' . $data_anime['movie_id'] . '/' . $ep_index) ?>" scrolling="no" frameborder="0" allowfullscreen="yes"></iframe>
        <div class="anime-episode">
          <div id="NextEP" class="swiper-container">
            <div class="swiper-wrapper">

              <?php foreach ($data_anime['ep_data'] as $key =>$val) { ?>


                <div class="swiper-slide">
                  <a onclick="goView('<?= ($data_anime['movie_id']) ?>','<?= $url_name ?>','<?= $key ?> ')" tabindex="-1">
                    <img src="<?= $movie_picture ?>"><br>
                    <?= $val['NameEp'] ?>
                  </a>
                </div>
              <?php } ?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>

      <div id="anime-detail">
        <div class="anime-poster">
          <img src="<?= $movie_picture ?>">
        </div>
        <div class="anime-card-detail">
          <h1 class="anime-title"><?= $data_anime['movie_thname'] ?> </h1>
          <div class="anime-category">
            <?php foreach ($data_anime['cate_data'] as $val) { ?>
              <span class="cate-name"><?= $val['category_name'] ?></span>

            <?php } ?>

          </div>
          <div class="anime-date">
            <span>APR 6, 2019</span>
            <span>EPISODES : 26</span>
            <span>RATING R - 17 +</span>
          </div>
          <div class="anime-description">
            <p>
              <?= $data_anime['movie_des'] ?>
            </p>
            <div class="anime-score">
              <span>SCORE</span>
              <?= $data_anime['movie_ratescore'] ?>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="anime-banners" class="bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 ">
        <img class="banners" src="https://gurubac.com//images/banner.jpg?692d2df5f9f9837e6112a0e772232da7">
      </div>
    </div>
  </div>
</section>

<script>
  window.onload = function() {

    var swiper = new Swiper('#NextEP', {
      slidesPerView: 4,
      spaceBetween: 30,
      centeredSlides: true,

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });

  };
</script>