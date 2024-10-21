<?php
session_start();
require_once("config/connect.php");

if(isset($_GET['search'])){
   $search = $_GET['search'];
   $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating FROM service INNER JOIN user ON service.id_seller = user.id LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service where service.judul LIKE '%". $search ."%' AND service.kategori_id=1";
}else{
   $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating FROM service INNER JOIN user ON service.id_seller = user.id LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service where service.kategori_id=1";
}

$result = mysqli_query($is_connect, $query1);
$all = mysqli_fetch_all($result, MYSQLI_BOTH);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Fonts -->


    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/produk.css"/>


    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    
</head>

<body>
    <header>
        <?php include('navbar.php') ?>
    </header>
    <div class="container">
    <?php
        foreach($all as $service){                       
    ?>
            <div class="product-list">
             <div class="product-item" onclick="window.location.href='#'">
              <img alt="RC Car" height="200" src="https://storage.googleapis.com/a1aa/image/OipuXdfeNuvlrEDYPJCceJSwNUQpndRZPHwj0IsnTIxoP6NnA.jpg" width="200"/>
              <h4>
              <?php echo $service['judul'] ?>
              </h4>
              <p class="price">
               Rp200.000
              </p>
              <div class="user-info">
               <img alt="User" height="20" src="https://storage.googleapis.com/a1aa/image/I4IOKv3ykKakCNcqg4rknFGCek0uwogeAZFUf8jatC7mX6NnA.jpg" width="20"/>
               <p>
                Mas Arizz
               </p>
              </div>
              <div class="rating">
               <i class="fas fa-star">
               </i>
               <span>
                2.0 | Sold
               </span>
              </div>
             </div>
            </div>
           </div>
        <?php
        }
        ?>
    </div>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
