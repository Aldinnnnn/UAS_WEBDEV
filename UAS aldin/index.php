<?php
include('koneksi.php');

$sql = "SELECT * FROM `film` ORDER BY startYear DESC LIMIT 10;";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <title>BiskopAppi</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo1.png" alt="" width="150" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=movie"> Movie<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=tvseries">TvSeries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=sport">Sport</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=kids">Kids</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="search.php?keyword=action">Action</a>
                        <a class="dropdown-item" href="search.php?keyword=animation">Animation</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=banned">Banned</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- Banner -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {

            ?>
                <a href="detail.php?id=<?php echo $data['imdb_id']; ?>" class="carousel-item <?= $no == 0 ? 'active' : '' ?>" style="background-image: url('<?php echo $data['image_url']; ?>');height: 500px ;background-size:inherit;">
                    <div class="carousel-caption d-none d-md-block" style="    background-image: linear-gradient(360deg, black, transparent);">
                        <h5><?php echo $data['title']; ?></h5>
                        <p><?php echo $data['plot']; ?></p>
                    </div>
            </a>
            <?php $no++;
            } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php

    $action = "SELECT * FROM `film` WHERE genres LIKE '%action%' LIMIT 10;;";
    $hasil = mysqli_query($koneksi, $action);


    ?>
    <div class="container my-5">
        <h1 class="my-3">Action</h1>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {

                ?>
                    <div class="swiper-slide">
                        <a href="detail.php?id=<?php echo $data['imdb_id']; ?>">
                            <div class="poster" style="background-image:url('<?php echo $data['image_url']; ?>');">
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php

$fantasy = "SELECT * FROM `film` WHERE genres LIKE '%fantasy%' LIMIT 10;";
$hasil = mysqli_query($koneksi, $fantasy);


?>
    <div class="container my-5">
        <h1 class="my-3">Fantasy</h1>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {

                ?>
                    <div class="swiper-slide">
                        <a href="detail.php?id=<?php echo $data['imdb_id']; ?>">
                            <div class="poster" style="background-image:url('<?php echo $data['image_url']; ?>');">
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

  
    <?php

$animation = "SELECT * FROM `film` WHERE genres LIKE '%animation%' LIMIT 10;";
$hasil = mysqli_query($koneksi, $animation);


?>
    <div class="container my-5">
        <h1 class="my-3">Animation</h1>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {

                ?>
                    <div class="swiper-slide">
                        <a href="detail.php?id=<?php echo $data['imdb_id']; ?>">
                            <div class="poster" style="background-image:url('<?php echo $data['image_url']; ?>');">
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 30,
            slidesPerGroup: 5,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</body>

</html>
