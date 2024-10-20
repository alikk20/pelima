<?php
require_once("config/connect.php");

// Query untuk mendapatkan data review dan user
$query = "SELECT * FROM `review` 
          JOIN user ON user.id = review.id_user 
          JOIN service ON service.id = review.id_service 
          WHERE id_service = 1;";
$run_sql = mysqli_query($is_connect, $query);

$total_reviews = 0;
$total_five_star_reviews = 0;
$total_four_star_reviews = 0;
$total_three_star_reviews = 0;
$total_two_star_reviews = 0;
$total_one_star_reviews = 0;

// Query untuk menghitung rating review
$querye = "SELECT rating, COUNT(rating) AS count 
           FROM review 
           WHERE id_service = 1 
           GROUP BY rating;";
$result = mysqli_query($is_connect, $querye);

while ($row = mysqli_fetch_assoc($result)) {
    $total_reviews += $row['count'];
    switch ($row['rating']) {
        case 5:
            $total_five_star_reviews = $row['count'];
            break;
        case 4:
            $total_four_star_reviews = $row['count'];
            break;
        case 3:
            $total_three_star_reviews = $row['count'];
            break;
        case 2:
            $total_two_star_reviews = $row['count'];
            break;
        case 1:
            $total_one_star_reviews = $row['count'];
            break;
    }
}

// Menghitung persentase
$five_star_percentage = $total_reviews ? ($total_five_star_reviews / $total_reviews) * 100 : 0;
$four_star_percentage = $total_reviews ? ($total_four_star_reviews / $total_reviews) * 100 : 0;
$three_star_percentage = $total_reviews ? ($total_three_star_reviews / $total_reviews) * 100 : 0;
$two_star_percentage = $total_reviews ? ($total_two_star_reviews / $total_reviews) * 100 : 0;
$one_star_percentage = $total_reviews ? ($total_one_star_reviews / $total_reviews) * 100 : 0;

// Mendapatkan data produk dan seller
$query1 = "SELECT service.*, user.nama_lengkap AS seller 
           FROM service 
           JOIN user ON service.id_seller = user.id 
           WHERE user.id = 1;";
$runsql = mysqli_query($is_connect, $query1);
$fetch_data = mysqli_fetch_assoc($runsql); // Menggunakan fetch_assoc untuk mendapatkan satu data produk

// Query untuk menghitung jumlah dan rata-rata rating
$query5 = "SELECT COUNT(review.id) AS jumlah_review 
           FROM review 
           JOIN service ON service.id = review.id_service 
           WHERE id_service = 1;";
$runql = mysqli_query($is_connect, $query5);

$query6 = "SELECT AVG(rating) AS rata_rating 
           FROM review 
           WHERE id_service = 1;";
$runql2 = mysqli_query($is_connect, $query6);
$fetch_data3 = mysqli_fetch_assoc($runql2); // Mengambil rata-rata rating

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Detail Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 2px solid #eae2b7;
        }
        .header img {
            max-width: 100px;
            margin-right: 20px;
        }
        .icons a {
            margin-left: 15px;
        }
        .row {
            display: flex;
            margin-top: 20px;
            gap: 20px; /* Adds space between columns */
        }
        .product-detail-rating, .product-info {
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .product-detail-rating {
            flex: 2;
            background-color: #f9f9f9;
        }
        .product-info {
            flex: 1;
            background-color: #fff;
        }
        .image-gallery {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .thumbnails {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .thumbnails img {
            margin: 0 5px;
            cursor: pointer;
        }
        .buy-now {
            display: inline-block;
            padding: 10px 15px;
            background-color: #d62828;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .buy-now:hover {
            background-color: #a00000;
        }
        .tabs {
            margin: 20px 0;
        }
        .tabs span {
            padding: 10px 15px;
            cursor: pointer;
            border: 1px solid #ccc;
            margin-right: 5px;
            border-radius: 5px;
            transition: background 0.3s; /* Added transition for hover effect */
        }
        .tabs .active {
            background-color: #d62828;
            color: white;
        }
        .progress-label-left, .progress-label-right {
            display: inline-block; /* Ensure labels are aligned */
        }
    </style>
</head>
<body>
<div class="container">
    <header class="header">
        <div style="display: flex; align-items: center;">
            <img alt="Logo" src="../image/logo.svg" class="img-fluid"/>
            <div class="breadcrumb-container">
                <div class="title">Detail</div>
                <div><?php echo "dashboard/products/details" ?> - <?php echo $fetch_data["judul"] ?></div>
            </div>
        </div>
        <div class="icons">
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
            <a class="profile" href="#">
                <img alt="Profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/JjfdMgoefJQd1J1EhfzBYMHKmQsvrsvye3jutI7UYWf0Xf0yJA.jpg" width="40"/>
            </a>
        </div>
    </header>

    <div class="row">
        <div class="product-detail-rating">
            <div class="product-detail">
                <div class="image-gallery">
                    <img alt="Main product image" id="mainImage" class="img-fluid rounded" src="../image/dump/rc.jpg"/>
                    <div class="thumbnails" id="thumbnails">
                        <img alt="Thumbnail 1" height="60" onclick="changeImage('Screenshot 2024-10-09 093055.png')" src="Screenshot 2024-10-09 093055.png" width="60"/>
                        <img alt="Thumbnail 2" height="60" onclick="changeImage('download__1_-removebg-preview.png')" src="download__1_-removebg-preview.png" width="60"/>
                        <img alt="Thumbnail 3" height="60" onclick="changeImage('Screenshot 2024-10-15 074525.png')" src="Screenshot 2024-10-15 074525.png" width="60"/>
                        <div class="more" id="moreButton" onclick="showMoreThumbnails()">+ 4 more</div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h1 class="mt-5 mb-5">Reviews</h1>
                <div class="card">
                    <div class="card-header"><b><?php echo $fetch_data["judul"] ?></b> By <b><?php echo $fetch_data["seller"] ?></b></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <h1 class="text-warning mt-4 mb-4">
                                    <b><span id="average_rating"><?php 
                                        $rata = $fetch_data3["rata_rating"];
                                        $hasil = round($rata, 1);
                                        echo $hasil; 
                                    ?></span> / 5</b>
                                </h1>
                                <div class="mb-3">
                                    <?php
                                    $rating = $fetch_data3["rata_rating"];
                                    for ($i = 1; $i <= floor($rating); $i++) {
                                        echo '<i class="fas fa-star text-warning mr-1"></i>';
                                    }
                                    if ($rating - floor($rating) >= 0.5) {
                                        echo '<i class="fas fa-star-half-alt text-warning mr-1"></i>';
                                    }
                                    for ($i = ceil($rating); $i < 5; $i++) {
                                        echo '<i class="far fa-star text-warning mr-1"></i>';
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $five_star_percentage; ?>%" aria-valuenow="<?php echo $five_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total_five_star_reviews; ?> <span class="progress-label-left">5 Star</span></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $four_star_percentage; ?>%" aria-valuenow="<?php echo $four_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total_four_star_reviews; ?> <span class="progress-label-left">4 Star</span></div>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $three_star_percentage; ?>%" aria-valuenow="<?php echo $three_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total_three_star_reviews; ?> <span class="progress-label-left">3 Star</span></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $two_star_percentage; ?>%" aria-valuenow="<?php echo $two_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total_two_star_reviews; ?> <span class="progress-label-left">2 Star</span></div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo $one_star_percentage; ?>%" aria-valuenow="<?php echo $one_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total_one_star_reviews; ?> <span class="progress-label-left">1 Star</span></div>
                                    </div>
                                </div>
                                <div class="text-center mb-3">Total Reviews: <span class="badge badge-info"><?php echo $total_reviews; ?></span></div>
                            </div>

                            <div class="col-sm-8">
                                <?php
                                while ($review = mysqli_fetch_assoc($run_sql)) {
                                    echo '<div class="review-item">';
                                    echo '<h5>' . $review['nama_lengkap'] . '</h5>';
                                    echo '<div class="review-rating">';
                                    for ($i = 1; $i <= $review['rating']; $i++) {
                                        echo '<i class="fas fa-star text-warning"></i>';
                                    }
                                    echo '</div>';
                                    echo '<p>' . $review['comment'] . '</p>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="buy-now text-center">
                <a href="#" class="buy-now">Buy Now</a>
            </div>
        </div>

        <div class="product-info">
            <h3>Product Information</h3>
            <p><strong>Price:</strong> <?php echo $fetch_data["harga"]; ?></p>
            <p><strong>Seller:</strong> <?php echo $fetch_data["seller"]; ?></p>
            <p><strong>Description:</strong> <?php echo $fetch_data["deskripsi"]; ?></p>
            <div class="tabs">
                <span class="active">Details</span>
                <span>Reviews</span>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(imageSrc) {
        document.getElementById('mainImage').src = imageSrc;
    }

    function showMoreThumbnails() {
        // Logic for showing more thumbnails can be implemented here
        alert('Show more thumbnails clicked!');
    }

    function showTab(tabName) {
        // Hide all tab contents
        const tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => tab.style.display = 'none');
        
        // Remove active class from all tabs
        const tabLinks = document.querySelectorAll('.tabs span');
        tabLinks.forEach(tabLink => tabLink.classList.remove('active'));
        
        // Show the selected tab content
        document.getElementById(tabName).style.display = 'block';
        document.querySelector(`.tabs span[onclick="showTab('${tabName}')"]`).classList.add('active');
    }
</script>
</body>
</html>
