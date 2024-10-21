<?php
require_once("config/connect.php");
$idjasa = $_GET['idjasa'];
$query1 = "SELECT service.*, user.nama_lengkap as seller, kategori.kategori as jenis 
           FROM service 
           JOIN user ON service.id_seller = user.id 
           JOIN kategori ON service.kategori_id = kategori.id 
           WHERE user.id = 1;";
$runsql = mysqli_query($is_connect, $query1);
$fetch_data = mysqli_fetch_all($runsql, MYSQLI_BOTH);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail - <?php echo $fetch_data[0]["judul"] ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
</head>
<body>
  <div class="container mt-4 position-relative">
    <div class="row align-items-center justify-content-center mb-4">
      <div class="col-sm text-start d-flex align-items-center">
        <img src="../image/logo.svg" alt="Logo" class="img-fluid me-2" style="max-height: 60px; width: auto; border-radius: 10px;">
        <div class="d-flex flex-column justify-content-center">
          <h4 class="h4 mb-0">Details</h4>
          <div class="d-flex flex-wrap">
              <a class="small mb-0 text-decoration-none" href="main.php" style="color: #8C6363;">dashboard/</a>
              <a class="small mb-0 text-decoration-none" href="jasa.php" style="color: #8C6363;">service/</a>
              <a class="small mb-0 text-decoration-none" href="#" style="color: #8C6363;"><?php echo $fetch_data[0]["judul"]; ?></a>
          </div>
      </div>
      </div>
      <div class="col-sm text-end">
        <img class="rounded-circle img-fluid" src="https://storage.googleapis.com/a1aa/image/JjfdMgoefJQd1J1EhfzBYMHKmQsvrsvye3jutI7UYWf0Xf0yJA.jpg" alt="Image" style="max-height: 60px; width: auto; border-radius: 10px;">
      </div>
    </div>

    <hr class="border-bottom border-1 border-dark">

    <!-- Images section -->
    <div class="row ">
      <div class="col-md-6">
        <div class="mb-4">
          <img alt="Main product image" id="mainImage" src="../image/dump/home-made-robot-desk.jpg" class="img-fluid mb-2 border-radius" style="border-radius: 25px;">
          <div class="d-flex justify-content-start">
              <img alt="Thumbnail 1" src="../image/dump/home-made-robot-desk.jpg" class="img-fluid me-2" style="width: calc((100% - 20px) / 4); border-radius: 15px;" onclick="changeImage('../image/dump/home-made-robot-desk.jpg')">
              <img alt="Thumbnail 2" src="../image/dump/home-made-robot-desk.jpg" class="img-fluid me-2" style="width: calc((100% - 20px) / 4); border-radius: 15px;" onclick="changeImage('../image/dump/home-made-robot-desk.jpg')">
              <img alt="Thumbnail 3" src="../image/dump/home-made-robot-desk.jpg" class="img-fluid me-2" style="width: calc((100% - 20px) / 4); border-radius: 15px;" onclick="changeImage('../image/dump/home-made-robot-desk.jpg')">
              <div class="more d-flex align-items-center justify-content-center" id="moreButton" onclick="showMoreThumbnails()" style="cursor:pointer; width: calc((100% - 20px) / 4); border-radius: 15px; background-color: #f9f9f9; border: 1px solid #ccc; text-align: center;">
                  + 4 more
              </div>
          </div>
        </div>



        <!-- Rating Section -->
        <?php include('reting.php') ?>
      </div>

      <!-- Buying Section -->
      <div class="col-md-6 sticky-top px-5" style="top: 20px; align-self: flex-start;">
        <h2><?php echo $fetch_data[0]["judul"] ?></h2>
        <p class="fs-3">Rp. <?php echo $fetch_data[0]["hargamin"] ?> - Rp. <?php echo $fetch_data[0]["hargamax"] ?></p>
        <p>
          Sold <span style="color: #8C6363;">36</span> · 
          <span class="text-black">
            <i class="text-warning fas fa-star"></i> 
            3.0 <span style="color: #8C6363;">(30)</span>
          </span> ·
          Review <span  style="color: #8C6363;">(30)</span>
        </p>
        <p>
          <span class="border rounded p-1" style="background-color: #d9d9d9;"><?php echo $fetch_data[0]["jenis"] ?></span>
          <span class="border rounded p-1" style="background-color: #d9d9d9;"><?php echo $fetch_data[0]["kategori"] ?></span>
        </p>
        <div class="mb-2">
          <span class="font-weight-bold">Details</span>
        </div>
        <div class="mt-0 " id="details">
          <p class="mb-0 font-weight-bold">Service Description</p>
          <p class="mb-0"><?php echo $fetch_data[0]["deskripsi"] ?></p>
        </div>
        <div class="btn mt-3 w-100 d-flex align-items-center justify-content-center" style="background-color: #F77F00; border-radius: 15px;">
          <span class="material-symbols-outlined me-2" style="color: #FFFFFF;">forum</span>
          <span style="color: #FFFFFF;">Chat Now</span>
        </div>
      </div>  
    </div>
  </div>

  <script src="js/tuku.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
