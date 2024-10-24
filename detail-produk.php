<?php
require_once("config/connect.php");
$idproduk = $_GET['idproduk'];
$query1 = "SELECT service.*, user.nama_lengkap as seller, user.no_telp as telp, kategori.kategori as jenis 
           FROM service 
           JOIN user ON service.id_seller = user.id 
           JOIN kategori ON service.kategori_id = kategori.id 
           WHERE service.id = '$idproduk';";
$runsql = mysqli_query($is_connect, $query1);
$fetch_data = mysqli_fetch_all($runsql, MYSQLI_BOTH);

$url = "https://wa.me/".$fetch_data[0]["telp"];
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

  <link rel="stylesheet" href="./css/tumbas.css">
</head>
<body>
  <div class="container mt-4 position-relative">
    <div class="row align-items-center justify-content-center mb-4">
        <div class="col-sm text-start d-flex align-items-center">
            <img src="../image/logo.svg" alt="Logo" class="img-fluid me-2" style="max-height: 60px; width: auto; border-radius: 10px;">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="h4 mb-0">Details</h4>
                <div class="d-flex flex-wrap">
                    <a class="small mb-0 text-decoration-none" href="index.php" style="color: #8C6363;">dashboard/</a>
                    <a class="small mb-0 text-decoration-none" href="products.php" style="color: #8C6363;">product/</a>
                    <a class="small mb-0 text-decoration-none" href="#" style="color: #8C6363;"><?php echo $fetch_data[0]["judul"]; ?></a>
                </div>
            </div>
        </div>
        <div class="col-sm text-end position-relative">
            <div class="account p-2 d-flex justify-content-end align-items-center">
                <a href="profile-buyer.php" class="btn btn-labeled d-flex align-items-center">
                <?php echo $fetch_data[0]["seller"] ?> <i class="material-symbols-outlined ms-2">person</i>
                </a>
            </div>
        </div>
    </div>

    <hr class="border-bottom border-1 border-dark">

    <!-- Images section -->
    <div class="row ">
      <div class="col-md-6">
        <div class="mb-4">
        <img alt="Main product image" id="mainImage" src="../image/product/<?php echo $fetch_data[0]["id"] ?>/<?php echo $fetch_data[0]["foto"] ?>" class="img-fluid mb-2 border-radius" style="height: 375px; width: 500px; border-radius: 25px; object-fit: cover;">
        </div>

        <!-- Rating Section -->
        <?php include('rating-products.php') ?>
      </div>

      <!-- Buying Section -->
      <?php
      require_once("config/connect.php");
      $query4 = "SELECT service.*, user.nama_lengkap as seller, kategori.kategori as jenis 
                 FROM service 
                 JOIN user ON service.id_seller = user.id 
                 JOIN kategori ON service.kategori_id = kategori.id 
                 WHERE service.id = '$idproduk';";
        $runsql1 = mysqli_query($is_connect, $query4);
        $fetch_data1 = mysqli_fetch_all($runsql1, MYSQLI_BOTH);
        foreach($fetch_data1 as $data){
      ?>
      <div class="col-md-6 sticky-top px-5" style="top: 20px; align-self: flex-start;">
        <h2><?php echo $data["judul"] ?></h2>
        <p class="fs-3">Rp. <?php echo $data["hargamin"] ?> - Rp. <?php echo $data["hargamax"] ?></p>
        <p>          <span class="text-black">
          <?php
            $query5 = "SELECT AVG(rating) AS rata_rating, COUNT(review.id) AS jumlah_review FROM review WHERE id_service = '$idproduk';";
              $runsql2 = mysqli_query($is_connect, $query5);
              $fetch_data2 = mysqli_fetch_all($runsql2, MYSQLI_BOTH);
              foreach($fetch_data2 as $data1){
            ?>
            <i class="text-warning fas fa-star"></i> 
            <?php 
              $rata=$data1["rata_rating"];
              $hasil = round($rata, 1);
              echo $hasil; 
            ?><span style="color: #8C6363;"> (<?php echo $data1["jumlah_review"]?>)</span>
            <?php
              }
            ?>
          </span>
        </p>
        <p>
          <span class="border rounded p-1" style="background-color: #d9d9d9;">Produk</span>
          <span class="border rounded p-1" style="background-color: #d9d9d9;"><?php echo $data["kategori"] ?></span>
        </p>

        <!-- detail and specification -->
        <div class="mb-2">
            <span class="font-weight-bold me-2" id="detailsTab" style="cursor: pointer;">Details</span>
            <!--<span class="font-weight-bold tab" id="specificationTab" style="cursor: pointer;">Specification</span>-->
        </div>

        <div class="mt-0" id="details" style="display: block;">
            <p class="mb-0 font-weight-bold">Service Description</p>
            <p class="mb-0"><?php echo $data["deskripsi"]; ?></p>
        </div>

        <!--<div class="specification" id="specification" style="display: none;">
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
        </div> -->

        <a href=<?php echo $url?> class="text-decoration-none">
        <div class="btn mt-3 w-100 d-flex align-items-center justify-content-center"  style="background-color: #F77F00; border-radius: 15px; ">
          <span class="material-symbols-outlined me-2" style="color: #FFFFFF;">forum</span>
          <span style="color: #FFFFFF;">Chat Now</span>
        </div>
            </a>
      </div>  
      <?php
        }
      ?>
    </div>
  </div>
  

  <script>
    // show details tab
    function showDetails() {
        document.getElementById('details').style.display = 'block';
        document.getElementById('specification').style.display = 'none';
        document.getElementById('detailsTab').classList.add('active');
        document.getElementById('specificationTab').classList.remove('active');
    }

    // show specification tab
    function showSpecification() {
        document.getElementById('details').style.display = 'none';
        document.getElementById('specification').style.display = 'block';
        document.getElementById('specificationTab').classList.add('active');
        document.getElementById('detailsTab').classList.remove('active');
    }

    // Event listeners for the tabs
    document.getElementById('detailsTab').addEventListener('click', showDetails);
    document.getElementById('specificationTab').addEventListener('click', showSpecification);
  </script>

  <!-- <script src="../js/tuku.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
