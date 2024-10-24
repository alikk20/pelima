<?php
session_start();
require_once("config/connect.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : 'services'; // Default to 'services'

// Prepare the SQL query based on whether a search term is provided and the type
if (!empty($search)) {
    $search = mysqli_real_escape_string($is_connect, $search); // Prevent SQL injection
    
    if ($type === 'services') {
        $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating 
                    FROM service 
                    INNER JOIN user ON service.id_seller = user.id 
                    LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service 
                    LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service 
                    WHERE service.judul LIKE '%" . $search . "%' AND service.kategori_id=2";
    } elseif ($type === 'products') {
        $query1 = "SELECT * FROM products WHERE product_name LIKE '%" . $search . "%'";
    } else {
        // Handle invalid type or default case
        $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating 
                    FROM service 
                    INNER JOIN user ON service.id_seller = user.id 
                    LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service 
                    LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service 
                    WHERE service.kategori_id=2";
    }
} else {
    if ($type === 'services') {
        $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating 
                    FROM service 
                    INNER JOIN user ON service.id_seller = user.id 
                    LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service 
                    LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service 
                    WHERE service.kategori_id=2";
    } elseif ($type === 'products') {
        $query1 = "SELECT * FROM products";
    } else {
        // Default query for services if type is invalid
        $query1 = "SELECT service.*, user.nama_lengkap AS penjual, review_counts.jumlah_review, avg_rating.rata_rating 
                    FROM service 
                    INNER JOIN user ON service.id_seller = user.id 
                    LEFT JOIN (SELECT id_service, COUNT(id) AS jumlah_review FROM review GROUP BY id_service) AS review_counts ON service.id = review_counts.id_service 
                    LEFT JOIN (SELECT id_service, AVG(rating) AS rata_rating FROM review GROUP BY id_service) AS avg_rating ON service.id = avg_rating.id_service 
                    WHERE service.kategori_id=2";
    }
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

    <!-- Bootstrap CSS v5.2.1 -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="css/produk.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>

<body>
    <header>
        <?php include('navbar.php') ?>
    </header>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
            <?php if (empty($all)): ?>
                <div class="col mb-4">
                    <p>No services found for your search query.</p>
                </div>
            <?php else: ?>
                <?php foreach ($all as $service): ?>
                    <div class="col mb-4">
                        <div class="product-item" onclick="window.location.href='detail-jasa.php?idjasa=<?php echo $service['id'] ?>'">
                            <img alt="<?php echo $service['judul'] ?>" height="200"
                                 src="/image/service/<?php echo $service['id'] ?>/<?php echo $service['foto'] ?>" class="rounded w-100"
                                 style="object-fit: cover;" />
                            <div class="user-info">
                                <img alt="User" height="20"
                                     src="https://storage.googleapis.com/a1aa/image/I4IOKv3ykKakCNcqg4rknFGCek0uwogeAZFUf8jatC7mX6NnA.jpg"
                                     width="20" />
                                <p><?php echo $service['penjual'] ?></p>
                            </div>
                            <p class="product-description"><?php echo $service['deskripsi'] ?></p>
                            <h4 class="product-title"><?php echo $service['judul'] ?></h4>
                            <p class="price">Rp<?php echo $service['hargamin'] ?></p>
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
                <?php endforeach; ?>
            <?php endif; ?>
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
