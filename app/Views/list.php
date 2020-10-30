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
<section class="bg-light text-center">
  <div class="container">
    <div id="anime-list" class="row">
      <div class="anime-title-list">
        <?php
        if (!empty($cate_name)) {
      
         $title = $cate_name ;

        } else if (!empty($keyword)) {
       
          $title = 'คุณกำลังค้นหา : '. $keyword;
     
        }
        ?>
        <h1><?= $title ?></h1>
      </div>
      <ul id="list-anime" class="list-anime">

        <?PHP
        if ($list_anime) {
          foreach ($list_anime as $val) {

        ?>
            <li>
              <div class="anime-box">

                <?php if (substr($val['movie_picture'], 0, 4) == 'http') {
                  $movie_picture = $val['movie_picture'];
                } else {
                  $movie_picture = $path_thumbnail . $val['movie_picture'];
                }

                $url_name = urlencode(str_replace(' ', '-', $val['movie_thname']));

                ?>

                <a onclick="goView('<?= ($val['movie_id']) ?>','<?= $url_name ?>','0','<?= str_replace(' ','-' ,$val['ep_data'][0]['NameEp']) ?>')">
                  <img src="<?= $movie_picture ?>">
                </a>
                <span class="anime-view"><i class="fas fa-eye"></i> 3</span>
              </div>
              <div class="title-in">
                <div class="anime-score">
                  <span>score</span>
                  <span class="score"><?= $val['movie_ratescore'] ?></span>
                </div>
                <h2>
                  <a onclick="goView('<?= ($val['movie_id']) ?>','<?= $url_name ?>','0','<?= str_replace(' ','-' ,$val['ep_data'][0]['NameEp']) ?>')" tabindex="-1"><?= $val['movie_thname'] ?></a>
                </h2>
              </div>
            </li>
          <?php  }
        } else {
          ?>

          <h3> ไม่พบอนิเมะ ที่คุณค้นหา</h3>

        <?php
        } ?>


      </ul>
      <?php
      if ($list_anime) {
      ?>
        <button id="anime-loadmore">Load more ...</button>
      <?php
      }
      ?>

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
  $(document).ready(function() {
    var track_click = 2; //track user click on "load more" button, righ now it is 0 click
    var total_pages = '<?= $pagination['total_page'] ?>';
    var keyword = '<?= $keyword ?>';

    if( track_click >= total_pages ){
      $("#anime-loadmore").hide(0);
    }

    $("#anime-loadmore").click(function(e) { //user clicks on button

      if (track_click <= total_pages) //user click number is still less than total pages
      {
        //post page number and load returned data into result element
        $.get('<?php echo $url_loadmore ?>', {
          'page': track_click,
          'keyword': keyword,
        }, function(data) {

         //  $("#anime-loadmore").show(); //bring back load more button
          $("#list-anime").append(data); //append data received from server

          track_click++; //user click increment on load button

        }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
          alert(thrownError); //alert with HTTP error
        });

      }

      if(track_click >= total_pages){

        $("#anime-loadmore").hide(0);

      }

      // alert(track_click+" "+total_pages)

    });
  });
</script>