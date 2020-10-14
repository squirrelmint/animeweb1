<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Anime8k</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=$document_root?>assets/vendor/bootstrap/css/bootstrap.min.css?v=1" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?=$document_root?>assets/vendor/fontawesome-free/css/all.min.css?v=1" rel="stylesheet">
  <link href="<?=$document_root?>assets/vendor/simple-line-icons/css/simple-line-icons.css?v=1" rel="stylesheet" type="text/css">
  
  <!-- Swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=$document_root?>assets/css/landing-page.css?v=1" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SUB-THAI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SOUND-THAI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">MOVIE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTRACT</a>
            </li>
        </ul>
        <form id="anime-formsearch">
          <div class="input-group" id="adv-search">
            <input id="anime-search" class="anime-search" placeholder="Search..." value="">
            <div class="input-group-btn">
                <div class="btn-group" role="group">
                    <div class="dropdown dropdown-lg">
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
                              <div class="form-group col-md-4">
                                <label for="anime_category">Category :</label>
                                <select id="anime_category" name="anime_category" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </div>
          </div>
        </form>
     </div>
    </div>
  </nav>