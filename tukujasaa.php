<?php
require_once("config/connect.php");
$idjasa = $_GET['idjasa'];
$query1 = "SELECT service.*, user.nama_lengkap as seller, kategori.kategori as jenis from service join user on service.id_seller=user.id join kategori on service.kategori_id=kategori.id where user.id=1;";
$runsql = mysqli_query($is_connect, $query1);

?>

<html>

<head>
  <title>
    <?php
    $fetch_data = mysqli_fetch_all($runsql, MYSQLI_BOTH);
    foreach ($fetch_data as $data) {
      ?>
      Detail - <?php echo $data["judul"] ?>
    </title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="css/tuku.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="./css/style.css"/>
  </head>

  <body>
    <div class="container">
    <header>
        <navbar>
            <div class="topnav container-fluid d-flex flex-column ps-5 pt-5">
                <div class="flex-row usernav d-inline-flex justify-content-end">
                   <!-- <div class="cart p-2">
                        <button type="button" class="btn btn-labeled d-flex justify-content-between">
                            50+<i class="material-symbols-outlined">shopping_cart</i>
                        </button>
                    </div> -->
                    <div class="account p-2">
                        <button type="button" class="btn btn-labeled d-flex justify-content-between">
                            Ariadna<i class="material-symbols-outlined ms-2">person</i>
                        </button>
                    </div>
                </div>
                <div class="pagenav d-flex flex-row ms-4 px-1 pb-1 border-bottom align-items-center">
                	<div class="searchbar me-auto">
                		<div class="currentpage">
                			<h2>Explore</h2>
                		</div>
                	</div>
                	<div class="filsearch d-inline-flex pb-1 me-1"><!--
                		<div class="filter pb-1">
                			<button type="button" class="btn">
                				Filters
                			</button>
                		</div>-->
                    	<div class="search d-flex">
                    		<input type="text" name="search" placeholder="Search..." class="input" />
                        	<a href="#" class="btn d-flex justify-content-center">
                        		<i class="material-symbols-outlined my-auto me-3 ms-0">search</i>
                        	</a>
                    	</div>
                    </div>
                </div>
            </div>
        </navbar>
    </header>
    <div class="d-flex flex-column flex-shrink-0 sidebar-wrap border-end my-3 sidenav">
        <a href="/" class="text-decoration-none logo-wrap py-auto">
            <div class="icon-wrap">
                <img src="image/textlogo.svg">
            </div>
            <span><img src="image/logo.svg" class="mx-2"></span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">explore</i>
                    </div>
                    <span>Explore</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">show_chart</i>
                    </div>
                    <span>Popular</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">precision_manufacturing</i>
                    </div>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">card_travel</i>
                    </div>
                    <span>Services</span>
                </a>
            </li>
        </ul>
    </div>
      <!-- <hr> -->
      <div class="product-detail">
        <div class="image-gallery">
          <img alt="Main product image" height="400" id="mainImage" src="Screenshot 2024-10-09 093055.png" width="600" />
          <div class="thumbnails" id="thumbnails">
            <img alt="Thumbnail 1" height="60" onclick="changeImage('Screenshot 2024-10-09 093055.png')"
              src="Screenshot 2024-10-09 093055.png" width="60" />
            <img alt="Thumbnail 2" height="60" onclick="changeImage('download__1_-removebg-preview.png')"
              src="download__1_-removebg-preview.png" width="60" />
            <img alt="Thumbnail 3" height="60" onclick="changeImage('Screenshot 2024-10-15 074525.png')"
              src="Screenshot 2024-10-15 074525.png" width="60" />
            <div class="more" id="moreButton" onclick="showMoreThumbnails()">
              + 4 more
            </div>
          </div>
        </div>
        <div class="product-info">
          <h2>
            <?php echo $data["judul"] ?>
          </h2>
          <div class="rating">
            <i class="fas fa-star">
            </i>
            <i class="fas fa-star">
            </i>
            <i class="fas fa-star">
            </i>
            <i class="far fa-star">
            </i>
            <i class="far fa-star">
            </i>
            <span>
              (3/5)
            </span>
          </div>

          <div class="price">
            Rp. <?php echo $data["hargamin"] ?> - Rp. <?php echo $data["hargamax"] ?>
          </div>
          <div class="tags">
            <span>
              <?php echo $data["jenis"] ?>
            </span>
            <span>
              <?php echo $data["kategori"] ?>
            </span>
          </div>
          <div class="tabs">
            <span class="active" onclick="showTab('details')">
              Details
            </span>
            <span onclick="showTab('specification')">
              Specification
            </span>
          </div>
          <div class="description active" id="details">
            <p>
              Service Description
            </p>
            <p>
              <?php echo $data["deskripsi"] ?>
            </p>
          </div>
          <div class="specification" id="specification">
            <ul>
              <li><strong>Product type:</strong> Car</li>
              <li><strong>Product size:</strong> 50 cm x 70 cm</li>
              <li><strong>Included Parts:</strong>
                <ul>
                  <li>1 x Rc Car</li>
                  <li>1 x Remote</li>
                  <li>1 x USB Charger</li>
                  <li>2 x Rechargeable Batteries</li>
                  <li>Stickers</li>
                </ul>
              </li>
            </ul>
          </div>
          <a class="buy-now" href="#">
            Chat Now
          </a>
        </div>
      </div>
      <?php
    }
    ?>

    <?php include('reting.php') ?>
  </div>
  <script src="js/tuku.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>