<?php
session_start();
require_once("config/connect.php");

$query1 = "SELECT service.*, user.nama_lengkap AS penjual, COUNT(review.id) AS jumlah_review, AVG(review.rating) AS rata_rating FROM service LEFT JOIN review ON service.id = review.id_service JOIN user ON user.id = service.id_seller GROUP BY service.id, user.nama_lengkap ORDER BY rata_rating DESC, jumlah_review DESC; ";

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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/produk.css" />

    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>

<body>
    <header>
        <?php include('navbar.php') ?>
    </header>
    <!-- <div class="sort">
        <label for="sort">
            Sort by
        </label>
        <select id="sort">
            <option>
                Newest
            </option>
        </select>
    </div> -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
    
        <?php
        foreach ($all as $service) {
            ?>

             <div class="col mb-4">
                <div class="product-list">
                    <div class="product-item"
                        onclick="window.location.href='<?php echo ($service['kategori_id'] == '1') ? 'detail-produk.php?idproduk=' . $service['id'] : 'detail-jasa.php?idjasa=' . $service['id']; ?>'">
                        <img alt="<?php echo $service['judul'] ?>" height="200"
                            src="<?php echo ($service['kategori_id'] == '1') ? '/image/product/' : '/image/service/'; ?><?php echo $service['id'] ?>/<?php echo $service['foto'] ?>"
                            width="200" style="object-fit: cover;" />
                        <h4>
                            <?php echo $service['judul'] ?>
                        </h4>
                        <p class="price">
                            <?php echo $service['hargamin'] ?>
                        </p>
                        <div class="user-info">
                            <img alt="User" height="20"
                                src="https://storage.googleapis.com/a1aa/image/I4IOKv3ykKakCNcqg4rknFGCek0uwogeAZFUf8jatC7mX6NnA.jpg"
                                width="20" />
                            <p>
                                <?php echo $service['penjual'] ?>
                            </p>
                        </div>
                        <div class="rating">
                            <small class="text-muted">
                                <i class="fas fa-star text-warning mr-1"></i>
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
            </div>
            <?php
        }
        ?>
    </div>
</div>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>