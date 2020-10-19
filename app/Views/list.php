<section id="anime-banners" class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 ">
        <img class="banners" src="https://gurubac.com//images/banner.jpg?692d2df5f9f9837e6112a0e772232da7">
      </div>
    </div>
  </div>
</section>

<!-- Icons Grid -->
<section class="bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="anime-title-list">
        <?php
        if (!empty($category)) {
        ?>
          <h1>แอคชั่น</h1>

        <?php
        }
        ?>
        <?php
        if (!empty($keyword)) {
        ?>

          <h1>คุณกำลังค้นหา : <?= $keyword ?> </h1>
        <?php
        }
        ?>
        <!-- <h1>แอคชั่น</h1> -->
      </div>
      <ul id="list-anime" class="list-anime">

        <?PHP
        foreach ($list_anime as $val) {
          // echo '<pre>' . print_r($val, true) . '</pre>';
          // die;
        ?>
          <li>
            <div class="anime-box">

              <?php if (substr($val['movie_picture'], 0, 4) == 'http') {
                $movie_picture = $val['movie_picture'];
              } else {
                $movie_picture = $path_thumbnail . $val['movie_picture'];
              }

              $url_name = urlencode(str_replace(' ','-',$val['movie_thname']));

              ?>

              <a onclick="goView('<?= ($val['movie_id']) ?>','<?= $url_name ?>','0')">

                <img src="<?= $movie_picture ?>">
              </a>
            </div>
            <div class="title-in">
              <div class="anime-score">
                <span>score</span>
                <span class="score"><?= $val['movie_ratescore'] ?></span>
              </div>
              <h2>
                <a onclick="goView('<?= ($val['movie_id']) ?>','<?= $url_name ?>','0')" tabindex="-1"><?= $val['movie_thname'] ?></a>
              </h2>
            </div>
          </li>
        <?php  } ?>


      </ul>
      <button id="anime-loadmore">Load more ...</button>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    var track_click = 2; //track user click on "load more" button, righ now it is 0 click
    var total_pages = '<?= $pagination['total_page'] ?>';
    var keyword = '<?= $keyword ?>';

    // $('#list-anime').load("animedata", {'page':track_click}, function() {track_click++;}); //initial data to load
    $("#anime-loadmore").click(function(e) { //user clicks on button
      //  alert (keyword)
      // $(this).hide(); //hide load more button on click
      // $('.animation_image').show(); //show loading image

      if (track_click <= total_pages) //user click number is still less than total pages
      {
        //post page number and load returned data into result element
        $.get('<?php echo $url_loadmore ?>', {
          'page': track_click,
          'keyword': keyword,
        }, function(data) {

          $("#anime-loadmore").show(); //bring back load more button

          $("#list-anime").append(data); //append data received from server

          //scroll page smoothly to button id
          // $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);

          //hide loading image
          // $('.animation_image').hide(); //hide loading image once data is received

          track_click++; //user click increment on load button

        }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
          alert(thrownError); //alert with HTTP error
          // $(".load_more").show(); //bring back load more button
          // $('.animation_image').hide(); //hide loading image once data is received
        });


        if (track_click >= total_pages - 1) //compare user click with page number
        {
          //reached end of the page yet? disable load button
          $("#anime-loadmore").attr("disabled", "disabled");
        }
      }

    });
  });
</script>