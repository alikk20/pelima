<html>

<head>
   <title>
      Account Profile
   </title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="css/review.css">
</head>

<body>
   <div class="container">
   <header>
	<?php include('navbar-profile.php') ?>
   </header>
      <div class="content">
         <div class="header">
            <div>
               <h1>
                  Account
               </h1>
               <div class="breadcrumb">
                  dashboard/account/profile
               </div>
            </div>
            <div class="ad">
               <div>
                  <span>
                     want to sell something?
                  </span>
                  <a href="#">
                     sign up as a seller
                  </a>
               </div>
            </div>
         </div>
         <div class="review-section">
            <h2>
               My review
            </h2>
            <div class="filters">
               <select>
                  <option>
                     Last 3 months
                  </option>
               </select>
               <div class="search-container" id="search-container">
                  <input placeholder="Vendor Name/Service Name/Product Name" type="text" />
                  <button onclick="toggleSearchInput()">
                     <i class="fas fa-search">
                     </i>
                  </button>
               </div>
            </div>
            <div class="review-item">
               <div class="left">
                  <h3>
                     Jasa Servis Laptop
                  </h3>
                  <div class="meta">
                     Toko Mas Arizz
                  </div>
                  <div class="meta">
                     1 week ago
                  </div>
               </div>
               <div class="right">
                  <div class="rating">
                     <span>
                        Ratings
                     </span>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <span>
                        3.0
                     </span>
                  </div>
                  <div class="comment">
                     Pelayanan buruk, slow respond, tetapi cepat pengerjaannya
                  </div>
               </div>
            </div>
            <div class="review-item">
               <div class="left">
                  <h3>
                     Gucci Mas Windzz
                  </h3>
                  <div class="meta">
                     Toko Mas Arizz
                  </div>
                  <div class="meta">
                     1 week ago
                  </div>
               </div>
               <div class="right">
                  <div class="rating">
                     <span>
                        Ratings
                     </span>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <i class="fas fa-star">
                     </i>
                     <span>
                        3.0
                     </span>
                  </div>
                  <div class="comment">
                     Gucci palsu
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <script src="js/review.js"></script>

</body>

</html>