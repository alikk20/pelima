<?php
session_start();
require_once("config/connect.php");

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating FROM service INNER JOIN user ON service.id_seller = user.id LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service where service.judul LIKE '%" . $search . "%' AND service.kategori_id=2";
} else {
  $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating FROM service INNER JOIN user ON service.id_seller = user.id LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service where service.kategori_id=2";
}

$result = mysqli_query($is_connect, $query1);
$all = mysqli_fetch_all($result, MYSQLI_BOTH);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Fonts -->

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/produk.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>

<body>
  <header>

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
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body style="font-family: Merriweather Sans, sans-serif;">
    <header>
        <navbar>
            <div class="topnav container-fluid d-flex flex-column ps-5 pt-5">
                <div class="flex-row usernav d-inline-flex justify-content-end">
                    <!-- <div class="cart p-2">
                        <button type="button" class="btn btn-labeled d-flex justify-content-between">
                            50+<i class="material-symbols-outlined">shopping_cart</i>
                        </button>
                    </div> -->
                    <?php if (isset($_SESSION['id'])): ?>
                        <div class="account p-2">
                            <a href="profile-buyer.php" class="btn btn-labeled d-flex justify-content-between">
                                <?php echo $_SESSION['nama_lengkap']; ?><i class="material-symbols-outlined ms-2">person</i>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="login-btn p-2">
                            <a href="loginn.php" class="btn btn-labeled d-flex justify-content-between" style="background-color: #f77f00; text-decoration: none; color: white;">
                                Login
                            </a>
                        </div>
                    <?php endif; ?>
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
                        <form action="services.php" method="GET">
                        <div class="search d-flex">
                            <input type="text" name="search" placeholder="Search..." class="input" />
                            <a href="#" class="btn d-flex justify-content-center">
                                <i class="material-symbols-outlined my-auto me-1 ms-0">search</i>
                            </a>
                        </div>
                        </form>
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
        <!-- <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link" aria-current="page">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">explore</i>
                    </div>
                    <span>Explore</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link active" >
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
        </ul> -->
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/index.php" class="nav-link <?php echo ($uri == '/index.php') ? 'active' : ''; ?>"
                    aria-current="page">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">explore</i>
                    </div>
                    <span>Explore</span>
                </a>
            </li>
            <li>
                <a href="/popular.php" class="nav-link <?php echo ($uri == '/popular.php') ? 'active' : ''; ?>">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">show_chart</i>
                    </div>
                    <span>Popular</span>
                </a>
            </li>
            <li>
                <a href="/products.php" class="nav-link <?php echo ($uri == '/products.php') ? 'active' : ''; ?>">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">precision_manufacturing</i>
                    </div>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="/services.php" class="nav-link <?php echo ($uri == '/services.php') ? 'active' : ''; ?>">
                    <div class="icon-wrap">
                        <i class="material-symbols-outlined">card_travel</i>
                    </div>
                    <span>Services</span>
                </a>
            </li>
        </ul>
    </div>
    <main>
        <div class="d-flexbg-dark">
            <p>tets</p>

        </div>
    </main>

</body>
  </header>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
    <?php foreach ($all as $service) { ?>
      <div class="col mb-4">
        <div class="product-item" onclick="window.location.href='detail-jasa.php?idjasa=<?php echo $service['id'] ?>'">
          <img alt="<?php echo $service['judul'] ?>" height="200"
               src="/image/service/<?php echo $service['id'] ?>/<?php echo $service['foto'] ?>" class="rounded w-100"
               style="object-fit: cover;" />
          <div class="user-info">
            <img alt="User" height="20"
              src="https://storage.googleapis.com/a1aa/image/I4IOKv3ykKakCNcqg4rknFGCek0uwogeAZFUf8jatC7mX6NnA.jpg"
              width="20" />
            <p>
            <?php echo $service['penjual'] ?>
            </p>
          </div>
          <p class="product-description">
          <?php echo $service['deskripsi'] ?>
          </p>
          <h4 class="product-title">
          <?php echo $service['judul'] ?>
          </h4>
          <p class="price">
            Rp<?php echo $service['hargamin'] ?>
          </p>

          <div class="rating">
            <small class="text-muted">
            <i class="text-warning fas fa-star"></i> 
            <?php
            $rata = $service["rata_rating"];
            $hasil = round($rata, 1);
            echo $hasil;
            ?>
            (<?php echo $service['jumlah_review'] ?>)
            </small>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="js/produk.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>