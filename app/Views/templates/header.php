<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Anime8k</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= $document_root ?>assets/vendor/bootstrap/css/bootstrap.min.css?v=1" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= $document_root ?>assets/vendor/fontawesome-free/css/all.min.css?v=1" rel="stylesheet">
  <link href="<?= $document_root ?>assets/vendor/simple-line-icons/css/simple-line-icons.css?v=1" rel="stylesheet" type="text/css">

  <!-- Swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= $document_root ?>assets/css/landing-page.css?v=1" rel="stylesheet">

  <!-- Bootstrap core JavaScript -->
  <script src="<?= $document_root ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= $document_root ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img style="   height: 150px;" src="<?= base_url().'/public/logo/Logo-Anime-8k-1.png' ?> ">
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item <?= $chk_act['home'] ?>">
            <a class="nav-link" href=" <?php echo base_url() ?> ">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?= $chk_act['subthai'] ?>">
            <a class="nav-link" href="#">SUB-THAI</a>
          </li>
          <li class="nav-item <?= $chk_act['soundthai'] ?>">
            <a class="nav-link" href="#">SOUND-THAI</a>
          </li>
          <li class="nav-item dropdown <?= $chk_act['category'] ?>">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORY</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              foreach ($list_category as $val) {
                if ( !empty($cate_id) && $cate_id == $val['category_id']) {
                  $active = 'active';
                }else{
                  $active = '';

                }

              ?>


                <a class="dropdown-item <?= $active ?>" onclick="goCate('<?= ($val['category_id']) ?>','<?= $val['category_name'] ?>')"><?= $val['category_name'] ?></a>

              <?php
              } ?>


            </div>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#anime-contract">CONTRACT</a>
          </li>
        </ul>
        <form id="anime-formsearch">
          <div class="input-group" id="adv-search">
            <?php
            if (!empty($keyword)) {
              $value = $keyword;
            } else {
              $value = '';
            }
            ?>

            <input id="anime-search" class="anime-search" placeholder="Search..." value="<?php echo $value ?>">
            <div class="input-group-btn">
              <div class="btn-group" role="group">
                <button type="submit" class="anime-search-button"><i class="fas fa-search"></i></button>
                <!-- <div class="dropdown dropdown-lg">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <div class="anime-search-detail">
                            <label>Type :</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="anime_type1" name="anime_type" value="movie">
                              <label class="form-check-label" for="anime_type1">
                                Movie
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="anime_type2" name="anime_type" value="subthai">
                              <label class="form-check-label" for="anime_type2">
                                SUB-THAI
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="anime_type3" name="anime_type" value="soundthai">
                              <label class="form-check-label" for="anime_type3">
                                SOUND-THAI
                              </label>
                            </div>
                          </div>
                          <div class="anime-search-line"></div>
                          <div class="anime-search-detail">
                            <div class="form-group">
                              <label for="anime_category">Category :</label>
                              <select id="anime_category" name="anime_category" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                          </div>
                      </div>
                  </div> -->
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <script>
    $(document).ready(function() {      
      $('#anime-formsearch').submit(function(e) {
        goSearch();
        return false; //<---- Add this line
      });

      function goSearch() {

        var animesearch = $.trim($("#anime-search").val())

        if (animesearch) {
          window.location.href = "/search/" + $("#anime-search").val();
        } else {
          window.location.href = "<?= base_url() ?>";
        }

      }
    });
  </script>

  <!-- Modal -->
  <div class="modal fade" id="anime-contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#request">ขอหนัง</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#contract">ติดต่อลงโฆษณา</a>
            </li>
          </ul>
          <div class="tab-content" id="formrequest">
            <div id="request" class="tab-pane container active">
              <form method="POST" action="">
                <textarea rows="4" id="request_text" class="form-control"></textarea>
                <center><button type="submit" class="anime-btnrequest">ส่งข้อความ</button></center>
              </form>
            </div>
            <div id="contract" class="tab-pane container fade">
              <form method="POST" action="">
                <label> ชื่อ สกุล *:</label><input id="ads_con_name" type="text" class="form-control"/>
                <label> Email *:</label><input id="ads_con_email" type="text" class="form-control"/>
                <label> Line ID *:</label><input id="ads_con_line" type="text" class="form-control"/>
                <label> เบอร์โทรศัพท์ *:</label><input id="ads_con_tel" type="text" class="form-control"/>
                <center><button type="submit" class="anime-btnrequest">ส่งข้อความ</button></center>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>