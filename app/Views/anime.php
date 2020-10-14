  
  <!-- Icons Grid -->
  <section id="anime-video" class="bg-dark text-center">
    <div class="container">
      <div class="row">

        <div id="anime-player">
          <iframe id="player" class="player" src="<?= base_url('player/1/0') ?>" scrolling="no" frameborder="0" allowfullscreen="yes"></iframe>
          <div class="anime-episode">
            <div id="NextEP" class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
                <div class="swiper-slide">Slide 10</div>
              </div>
              <!-- Add Pagination -->
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>

        <div id="anime-detail">
          <div class="anime-poster">
            <img src="https://images-na.ssl-images-amazon.com/images/I/71nQwqxnYZL._AC_SY741_.jpg">
          </div>
          <div class="anime-card-detail">
            <h1 class="anime-title">KIMETSU NO YAIBA</h1>
            <div class="anime-category">
              <span class="cate-name">Action</span>
              <span class="cate-name">Demons</span>
              <span class="cate-name">Historical</span>
              <span class="cate-name">shounen</span>
            </div>
            <div class="anime-date">
              <span>APR 6, 2019</span>
              <span>EPISODES : 26</span>
              <span>RATING R - 17 +</span>
            </div>
            <div class="anime-description">
              <p>
                เรื่องราวเกิดขึ้นในประเทศญี่ปุ่นยุคไทโช คามาโดะ ทันจิโร่ เป็นเด็กหนุ่มผู้มีจิตใจอ่อนโยนและเฉลียวฉลาด ในฐานะลูกชายคนโตของครอบครัวคนเผาถ่าน เขาจึงเป็นหัวเรี่ยวหัวแรงในการหารายได้เลี้ยงดูครอบครัวจากการเผาถ่านไปขายหลังจากพ่อของเขาเสียชีวิต ทุกสิ่งทุกอย่างได้เปลี่ยนแปลงไปเมื่อมีอสูรบุกเข้ามาสังหารคนในครอบครัวของทันจิโร่ เหลือแต่เพียงเขาและน้องสาวที่ชื่อเนะซึโกะเท่านั้น เนะซึโกะที่รอดตายมาได้กลับกลายเป็นอสูรไป ทว่าก็น่าประหลาดใจที่เธอยังคงมีความคิดและการแสดงอารมณ์อย่างมนุษย์หลงเหลืออยู่ หลังจากที่ทันจิโร่ได้ต่อสู้กับโทมิโอะกะ กิยู นักล่าอสูรที่เดินทางผ่านมาและต้องการจะฆ่าเนะซึโกะที่กลายเป็นอสูรไปแล้ว เขาจึงตัดสินใจที่จะเป็นนักล่าอสูรตามคำชักชวนของกิยู เพื่อหาทางทำให้น้องสาวกลับมาเป็นมนุษย์ และชำระแค้นจากอสูรที่ฆ่าคนในครอบครัวของเขาให้จงได้
              </p>
              <div class="anime-score">
                <span>SCORE</span>
                8.69
              </div>
            </div>
          </div>
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


