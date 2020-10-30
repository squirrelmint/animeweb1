<?php foreach ($ads as $value) {
  if ($value['ads_position'] == "1") {
?>

    <section id="anime-banners" class="bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 ">
            <img class="banners" src='<?php echo  $path_ads . $value['ads_picture']; ?>'>
          </div>
        </div>
      </div>
    </section>

<?php } else {
  }
}
?>
<!-- Icons Grid -->
<section id="anime-video" class="bg-dark text-center">
  <div class="container">
    <div class="row">
      <?php if (substr($data_anime['movie_picture'], 0, 4) == 'http') {
        $movie_picture = $data_anime['movie_picture'];
      } else {
        $movie_picture = $path_thumbnail . $data_anime['movie_picture'];
      }
      $url_name = urlencode(str_replace(' ', '-', $data_anime['movie_thname']))

      ?>
      <div id="anime-player">
        <iframe id="player" class="player" src="<?= base_url('player/' . $data_anime['movie_id'] . '/' . $ep_index) ?>" scrolling="no" frameborder="0" allowfullscreen="yes"></iframe>
        <div class="anime-episode">
          <div id="NextEP" class="swiper-container">
            <div class="swiper-wrapper">

              <?php 
                foreach ($data_anime['ep_data'] as $key => $val) { 
                  $active = '';
                  if($ep_index==$key){
                    $active = 'active';
                  }
                  $url_nameep = urlencode(str_replace(' ', '-', $val['NameEp']));

              ?>
                <div class="swiper-slide">
                  <a onclick="goView('<?= ($data_anime['movie_id']) ?>','<?= $url_name ?>','<?= $key ?>','<?= $url_nameep ?>')" tabindex="-1">
                    <img src="<?= $movie_picture ?>">
                    <span class="<?=$active?>"><?= $val['NameEp'] ?></span>
                  </a>
                </div>
              <?php } ?>

            </div>
              
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
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
              <a href="<?php echo base_url().'/category/'.$val['category_id'].'/'.$val['category_name'] ?>" target="_blank">
                <span class="cate-name"><?= $val['category_name'] ?></span>
              </a>

            <?php } ?>

          </div>
          <div class="anime-date">
          <span> <?= $DateEng['m'].' '. $DateEng['d'].', '.$DateEng['Y'] ?></span>
            <span>EPISODES : <?= $data_anime['ep_data'][$ep_index]['NameEp']?></span>
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

<?php foreach ($ads as $value) {
  if ($value['ads_position'] == "2") {
?>

    <section id="anime-banners" class="bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 ">
            <img class="banners" src='<?php echo  $path_ads . $value['ads_picture']; ?>'>
          </div>
        </div>
      </div>
    </section>

<?php } else {
  }
}
?>
<script>
  window.onload = function() {

    var swiper = new Swiper('#NextEP', {
      speed: 800,
      spaceBetween: 100,
      slidesPerView: 4,
      spaceBetween: 30,
      centeredSlides: false,
      initialSlide: '<?=$ep_index?>',

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

  };
</script>