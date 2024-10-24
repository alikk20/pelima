<style>
    div.page-content {
        width: 90%;
        margin-top: 160px;
        margin-left: 90px;
        height: auto;
    }


    .main-page .panel-main {
        border-radius: 25px;
        padding: 20px;
        margin: 10px;
    }

    .main-page .panel-cream {
        background-color: #FCEFE4;
    }

    .main-page .panel-mustard {
        background-color: #EAE2B7;
    }

    .main-page .panel-orange {
        background-color: #F77F00;
    }

    .main-page .panel-top {
        height: 20vh;
    }


    .main-page .panel-top .carousel .carousel-item {
        position: relative;
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 15px;
    }

    .main-page .panel-top .carousel .carousel-item img {
        position: absolute;
        left: 50%;
        top: 50%;
        height: 100%;
        width: auto;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .main-page .panel-top .carousel .carousel-item img {
        width: auto;
        height: 100%;
    }


    .main-page .panel-bot .panel-main {
        height: 50vh;
    }

    .main-page .panel-bot .hero2 {
        padding: 0;
    }


    .main-page .panel-bot .hero3 {
        background-image: url('./image/dump/team.png');
        background-repeat: no-repeat;
        background-position: right bottom;
        background-size: 85%;
    }

    .main-page a {
        text-decoration: none;
        color: #000;
    }
</style>

<!doctype html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <meta http-equiv="refresh" content="">
    <meta name=”apple-mobile-web-app-capable” content=”yes “>
</head>

<body>
    <header>
        <?php
        session_start();
        require_once("config/connect.php");

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating FROM service INNER JOIN user ON service.id_seller = user.id LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service where service.judul LIKE '%" . $search . "%';";
        } else {
            $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating FROM service INNER JOIN user ON service.id_seller = user.id LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service";
        }

        $result = mysqli_query($is_connect, $query1);
        $all = mysqli_fetch_all($result, MYSQLI_BOTH);
        ?>

        <head>
            <title>Title</title>
            <!-- Required meta tags -->
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta http-equiv="refresh" content="">

            <!-- Fonts -->

            <!-- Bootstrap CSS v5.2.1 -->

            <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                crossorigin="anonymous" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
            <link rel="stylesheet" href="./css/style.css" />
        </head>

        <header>
            <?php include('navbar.php') ?>
        </header>

    <div class="page-content">

        <div class="d-flex flex-column main-page justify-content-between ">
            <div class="d-flex flex-row panel-top w-100">

                <div class="panel-main panel-cream w-50 d-inline-flex" onclick="window.location='/services.php';">
                    <div class="panel-label w-75 d-flex flex-column">
                        <h2 class="mb-auto"><b>Popular Services</b></h2>
                        <a href="/popular.php">See More</a>
                    </div>

                    <div id="carouselExampleSlidesOnly" class="carousel slide w-25 align-self-right"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="image/product/10/hidro.jpg" class="d-block w-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="image/product/2/1.jpg" class="d-block w-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="image/product/7/sabun.jpg" class="d-block w-auto" alt="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-main panel-mustard w-50 d-inline-flex justify-content-between"
                    onclick="window.location='/products.php';">
                    <div class="hero1title w-50 d-flex">
                        <h3 class="align-self-center"><b>Products made by Students</b></h3>
                    </div>
                    <div class="hero1 w-50 d-flex h-75">
                        <img class="img-fluid align-self-center" src="./image/dump/mesin.png" />
                    </div>
                </div>

            </div>

            <div class="d-flex flex-row panel-bot w-100">

                <div class="w-25">
                    <a href="#">
                        <div class="panel-main panel-orange d-flex flex-column">
                            <h2 class="mb-auto"><b>Lets start your Freelance journey with Stevie!</b></h2>
                            <h2>Join Now!</h2>
                        </div>
                    </a>
                </div>

                <div class="w-25">
                    <div class="panel-main panel-cream hero2 d-flex align-items-end">
                        <img class="img-fluid" src="./image/dump/aji2.png" />
                    </div>
                </div>

                <div class="w-50">
                    <a href="#">
                        <div class="panel-main panel-cream hero3">
                            <h1><b>What We do? <br> Get to Know <br>Us</b></h1>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</body>

</html>
