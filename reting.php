<?php
require_once("config/connect.php");
$query = "SELECT * FROM `review` join user on user.id=review.id_user join service on service.id=id_service where id_service=1;";
$run_sql = mysqli_query($is_connect, $query);

$total_reviews = 0;
$total_five_star_reviews = 0;
$total_four_star_reviews = 0;
$total_three_star_reviews = 0;
$total_two_star_reviews = 0;
$total_one_star_reviews = 0;

$querye = "SELECT rating, COUNT(rating) as count FROM review join service on service.id=review.id_service where id_service = 1 GROUP BY rating;";
$result = mysqli_query($is_connect, $querye);

while ($row = mysqli_fetch_assoc($result)) {
    $total_reviews += $row['count'];
    if ($row['rating'] == 5) {
        $total_five_star_reviews = $row['count'];
    } elseif ($row['rating'] == 4) {
        $total_four_star_reviews = $row['count'];
    } elseif ($row['rating'] == 3) {
        $total_three_star_reviews = $row['count'];
    } elseif ($row['rating'] == 2) {
        $total_two_star_reviews = $row['count'];
    } elseif ($row['rating'] == 1) {
        $total_one_star_reviews = $row['count'];
    }
}

$five_star_percentage = $total_reviews ? ($total_five_star_reviews / $total_reviews) * 100 : 0;
$four_star_percentage = $total_reviews ? ($total_four_star_reviews / $total_reviews) * 100 : 0;
$three_star_percentage = $total_reviews ? ($total_three_star_reviews / $total_reviews) * 100 : 0;
$two_star_percentage = $total_reviews ? ($total_two_star_reviews / $total_reviews) * 100 : 0;
$one_star_percentage = $total_reviews ? ($total_one_star_reviews / $total_reviews) * 100 : 0;

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Rating</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Merriweather Sans';
        }
        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }
        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }
        .star-light {
            color: #e9ecef;
        }
        .progress {
            height: 20px;
        }
        .progress-bar {
            line-height: 20px;
        }
        .tengah {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-5">Reviews</h1>
        <div class="card">
            <?php
            $query1 = "SELECT service.*, user.nama_lengkap as seller from service join user on service.id_seller=user.id where user.id=1;";
            $runsql = mysqli_query($is_connect, $query1);
            ?>
            <?php 
            $fetch_data = mysqli_fetch_all($runsql, MYSQLI_BOTH);
            foreach($fetch_data as $data){
            ?>
            <div class="card-header"><b><?php echo $data["judul"] ?></b>  By  <b><?php echo $data["seller"] ?></b></div>
            <div class="card-body">
            <?php }
            ?>
                <div class="row">
                <?php
                    $query5 = "SELECT COUNT(review.id) AS jumlah_review FROM review JOIN service on service.id=review.id_service where id_service =1;";
                    $runql = mysqli_query($is_connect, $query5);
                    $query6 = "SELECT AVG(rating) as rata_rating FROM review where id_service = 1;";
                    $runql2 = mysqli_query($is_connect, $query6);
                ?>
                    <div class="col-sm-4 text-center">
                        <h1 class="text-warning mt-4 mb-4">
                        <?php
                            $fetch_data3 = mysqli_fetch_all($runql2, MYSQLI_BOTH);
                            foreach($fetch_data3 as $data3){
                        ?>
                            <b><span id="average_rating"><?php 
                                $rata=$data3["rata_rating"];
                                $hasil = round($rata, 1);
                                echo $hasil; 
                            
                            ?></span> / 5</b>
    					</h1>
    					<div class="mb-3">
                            <?php
                            $rating = $data3["rata_rating"];
                            for ($i = 1; $i <= floor($rating); $i++) {
                                echo '<i class="fas fa-star text-warning mr-1"></i>';
                            }
                            if ($rating - floor($rating) >= 0.5) {
                                echo '<i class="fas fa-star-half-alt text-warning mr-1"></i>';
                            }
                            for ($i = round($rating); $i < 5; $i++) {
                                echo '<i class="fas fa-star star-light mr-1"></i>';
                            }
                            ?>
                        </div>
                        <?php }
                        ?>
                        <?php
                            $fetch_data2 = mysqli_fetch_all($runql, MYSQLI_BOTH);
                            foreach($fetch_data2 as $data2){
                        ?>
    					<h3><span id="total_review"><?php echo $data2["jumlah_review"] ?></span> Review</h3>
    				</div>
    				<div class="col-sm-4">
                         <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $total_five_star_reviews; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $five_star_percentage; ?>%" aria-valuenow="<?php echo $five_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $total_four_star_reviews; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $four_star_percentage; ?>%" aria-valuenow="<?php echo $four_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $total_three_star_reviews; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $three_star_percentage; ?>%" aria-valuenow="<?php echo $three_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $total_two_star_reviews; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $two_star_percentage; ?>%" aria-valuenow="<?php echo $two_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $total_one_star_reviews; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $one_star_percentage; ?>%" aria-valuenow="<?php echo $one_star_percentage; ?>" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h5 class="mt-4 mb-3">Tambahkan Rating Anda</h5>
    					<button type="button" id="review_modal" class="btn" style="background-color: #F77F00; border-color: #F77F00; color: white;" data-toggle="modal" data-target="#review">Rating</button>    				</div>
    			</div>
                <?php }
                ?>
    		</div>
        <div class="mt-5" id="review_content">
        <?php
                $fetch_data = mysqli_fetch_all($run_sql, MYSQLI_BOTH);
                foreach($fetch_data as $data){
            ?>
        <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <b><?php echo $data["nama_lengkap"] ?></b>
                </div>
                <div class="card-body">
                <?php
                    $rating = $data["rating"];
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<i class="fas fa-star text-warning mr-1"></i>';
                        } else {
                            echo '<i class="fas fa-star star-light mr-1"></i>';
                        }
                    }
                    ?>
                    <?php echo $data["komentar"] ?>
                </div>
                <div class="card-footer text-right">
                <?php 
                    $tanggal = $data["tanggal"];
                    $dateTime = new DateTime($tanggal);
                    $formattedDate = $dateTime->format('Y l, F j, H:i:s A');
                    echo $formattedDate;
                    ?>
                </div>
            </div>
        </div>
        </div>
        <?php }
        ?>
        </div>

    </div>

    <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                <div class="tengah">
                    <div class="rateyo" id= "rating"
                        data-rateyo-rating="0"
                        data-rateyo-num-stars="5"
                        data-rateyo-score="3">
                    </div>
                    <span class='result'></span>
                    <input type="hidden" name="rating">
	        	</div>
                </div>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Add a comment..."></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
						<button type="button" class="btn" style="background-color: #F77F00; border-color: #F77F00; color: white;" id="save_review">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
        $(function () {
            $(".rateyo").rateYo({
                rating: 4,
                numStars: 5,
                fullStar: true
            }).on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.result').text('rating: ' + rating);
                $(this).parent().find('input[name=rating]').val(rating); // add rating value to hidden input field
            });
        });
</script>