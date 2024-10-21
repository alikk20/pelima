<?php
require_once("config/connect.php");
$idjasa = $_GET['idjasa'];
$query1 = "SELECT service.*, user.nama_lengkap as seller, kategori.kategori as jenis from service join user on service.id_seller=user.id join kategori on service.kategori_id=kategori.id where user.id=62;";
$runsql = mysqli_query($is_connect, $query1);
?>

<html>
 <head>
  <title>
  <?php
    $fetch_data = mysqli_fetch_all($runsql, MYSQLI_BOTH);
    foreach($fetch_data as $data){
  ?>
   Detail - <?php echo $data["judul"] ?>
  </title>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <link rel="stylesheet" href="css/tuku.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body>
  <div class="container">
    <div class="header">
        <div style="display: flex; align-items: center;">
         <img alt="Logo"  src="../image/logo.svg" class="img-fluid"/>
         <div class="breadcrumb-container">
          <div class="title">
           Detail
          </div>
          <div class="">
          <?php echo "dashboard/products/details" ?> - <?php echo $data["judul"] ?>
          </div>
         </div>
        </div>
        <div class="icons">
         <a href="#">
          <i class="fas fa-shopping-cart">
          </i>
         </a>
         <a class="profile" href="#">
          <img alt="Profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/JjfdMgoefJQd1J1EhfzBYMHKmQsvrsvye3jutI7UYWf0Xf0yJA.jpg" width="40"/>
         </a>
        </div>
    </div>
       <hr>
   <div class="product-detail">
    <div class="image-gallery">
        <img alt="Main product image" id="mainImage" class="img-fluid rounded" src="../image/dump/rc.jpg"/>
        <div class="thumbnails" id="thumbnails">
         <img alt="Thumbnail 1" height="60" onclick="changeImage('Screenshot 2024-10-09 093055.png')" src="Screenshot 2024-10-09 093055.png" width="60"/>
         <img alt="Thumbnail 2" height="60" onclick="changeImage('download__1_-removebg-preview.png')" src="download__1_-removebg-preview.png" width="60" />
         <img alt="Thumbnail 3" height="60" onclick="changeImage('Screenshot 2024-10-15 074525.png')" src="Screenshot 2024-10-15 074525.png" width="60" />
         <div class="more" id="moreButton" onclick="showMoreThumbnails()">
       + 4 more
      </div>
     </div>
    </div>
    
    <div class="product-info">
     <h2>
     <?php echo $data["judul"] ?>
     </h2>
     <!-- <div class="rating">
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
     </div> -->
     
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
       Product Description
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
 </body>
</html>