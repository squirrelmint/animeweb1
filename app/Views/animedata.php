
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
                  $movie_picture = $path_thumbnail.$val['movie_picture'];
                }
                ?>

                <a href="">

                  <img src="<?= $movie_picture ?>">
                </a>
              </div>
              <div class="title-in">
                <div class="anime-score">
                  <span>score</span>
                  <span class="score"><?= $val['movie_ratescore'] ?></span>
                </div>
                <h2>
                  <a href="/public/manga/index/title/31/Naruto" tabindex="-1"><?= $val['movie_thname'] ?></a>
                </h2>
              </div>
            </li>
          <?php  } ?>