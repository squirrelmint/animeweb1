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
  <section class="bg-light">
      <div class="container">
      <div id="anime-list" class="row">
        <div class="anime-title-list">
          <h1>แอคชั่น</h1>
        </div>
        <ul id="list-anime" class="list-anime">
          <li>
            <div class="anime-box">
              <a href="">
                <img src="https://images-na.ssl-images-amazon.com/images/I/71nQwqxnYZL._AC_SY741_.jpg">
              </a>
            </div>
            <div class="title-in">
              <div class="anime-score">
                <span>score</span>
                <span class="score">8.6</span>
              </div>
              <h2>
                <a href="/public/manga/index/title/31/Naruto" tabindex="-1">Naruto</a>
              </h2>
            </div>
          </li>
          <li>
            <div class="anime-box">
              <a href="">
                <img src="https://images-na.ssl-images-amazon.com/images/I/51wIwhIO6JL._AC_.jpg">
              </a>
            </div>
            <div class="title-in">
              <div class="anime-score">
                <span>score</span>
                <span class="score">8.6</span>
              </div>
              <h2>
                <a href="/public/manga/index/title/31/Naruto" tabindex="-1">Naruto</a>
              </h2>
            </div>
          </li>
        </ul>
        <button id="anime-loadmore">Load more ...</button>
      </div>
    </div>
  </section>
  
  <script>
    $(document).ready(function() {
      var track_click = 0; //track user click on "load more" button, righ now it is 0 click
      var total_pages = '1';

      // $('#list-anime').load("animedata", {'page':track_click}, function() {track_click++;}); //initial data to load
      $("#anime-loadmore").click(function (e) { //user clicks on button

        // $(this).hide(); //hide load more button on click
        // $('.animation_image').show(); //show loading image

        if(track_click <= total_pages) //user click number is still less than total pages
        {
          //post page number and load returned data into result element
          $.get('animedata',{'page': track_click}, function(data) {

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


          if(track_click >= total_pages-1) //compare user click with page number
          {
            //reached end of the page yet? disable load button
            $("#anime-loadmore").hide();
          }
        }

      });
    });
  </script>


