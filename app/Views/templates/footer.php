  <!-- menu mobile -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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

  <div class="menu-mobile">
    <ul>
      <li>
        <a href=" <?php echo base_url() ?> ">
          <i class="fas fa-home"></i>HOME
        </a>
      </li>
      <li>
        <a href="">
          <i class="fas fa-language"></i>SUB-THAI
        </a>
      </li>
      <li>
        <a href="">
          <i class="fab fa-teamspeak"></i>SOUND-THAI
        </a>
      </li>
      <li>
        <a href="#" onclick="openNav()">
          <i class="fas fa-film"></i>CATEGORY
        </a>
      </li>
      <li>
        <a href="#" data-toggle="modal" data-target="#anime-contract">
          <i class="fas fa-comments"></i>CONTRACT
        </a>
      </li>
    </ul>
  </div>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script>
    $(document).ready(function() {

      var mySwiper = new Swiper('#HomeSlide', {
        loop: true,
        speed: 800,
        spaceBetween: 100,
        effect: 'fade',

        // Slide auto play
        autoplay: {
          delay: 5000,
        },

        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      })

    });

    function goView(id, name , ep) {
    
      window.location.href = "/anime/" + id + '/' + name + '/' + ep;
    }

    

    function goCate(id, name) {

      window.location.href = "/category/" + id + '/' + name ;
    }
    /* Set the width of the side navigation to 0 */
    /* Set the width of the side navigation to 250px */
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    
  </script>

  </body>

  </html>