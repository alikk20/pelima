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
  </head>

  <body>
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-sm text-start d-flex align-items-center">
          <img src="../image/logo.svg" alt="Logo" class="img-fluid" style="width: 15%; height: 15%; margin-right: 10px;">
          <div class="">
            <h4 class="h-4">Details</h4>
            <p class="small">dashboard/</p>
          </div>
        </div>
        <div class="col-sm text-end">
          <img class="rounded-circle img-fluid" src="https://storage.googleapis.com/a1aa/image/JjfdMgoefJQd1J1EhfzBYMHKmQsvrsvye3jutI7UYWf0Xf0yJA.jpg" alt="Image" style="width: 15%; height: 15%;">
        </div>
      </div>
      
      <hr class="border-bottom border-1 border-dark">

      <!-- <hr> -->
      <div class="product-detail">
        <div class="image-gallery">
          <img alt="Main product image" id="mainImage" src="../image/dump/home-made-robot-desk.jpg" class="img-fluid" />
          <div class="thumbnails" id="thumbnails">
            <img alt="Thumbnail 1" height="60" onclick="changeImage('../image/dump/home-made-robot-desk.jpg')"
              src="../image/dump/home-made-robot-desk.jpg" width="60" />
            <img alt="Thumbnail 2" height="60" onclick="changeImage('../image/dump/home-made-robot-desk.jpg')"
              src="../image/dump/home-made-robot-desk.jpg" width="60" />
            <img alt="Thumbnail 3" height="60" onclick="changeImage('../image/dump/home-made-robot-desk.jpg')"
              src="../image/dump/home-made-robot-desk.jpg" width="60" />
            <div class="more" id="moreButton" onclick="showMoreThumbnails()">
              + 4 more
            </div>
          </div>
        </div>

        <!-- Buys Section -->
        <div class="product-info">
          <h2>
            <?php echo $data["judul"] ?>
          </h2>
          <div class="price">
            Rp. <?php echo $data["hargamin"] ?> - Rp. <?php echo $data["hargamax"] ?> 
          </div>
          <div class="">
            Sold <span>36</span> · 
            <span class="text-warning"><i class="fas fa-star"></i> 3.0</span> (30) · 
            Review (30)
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