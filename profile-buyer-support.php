<html>

<head>
  <title>
    Account Profile
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/support.css">
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
      <div class="profile-card">
        <div class="tabs">
          <div class="tab-button active" id="profile-button" onclick="showTab('profile')">
            Support Center
          </div>
          <div class="tab-button" id="security-button" onclick="showTab('security')">
            Order Isue
          </div>
        </div>
        <div class="content">
          <div class="tab-content active" id="profile">
            <div class="support-content">

              <h2>
                Looking For Support About?
              </h2>
              <div class="search-container">
                <i class="fas fa-search">
                </i>
                <input placeholder="Find help..." type="text" style="width: 80%;" />
              </div>
              <div class="faq">
                <h3>
                  How To Shop At Stevie?
                  <i class="fas fa-chevron-down">
                  </i>
                </h3>
              </div>
              <div class="faq">
                <h3>
                  Is Shopping At Stevie Safe?
                  <i class="fas fa-chevron-down">
                  </i>
                </h3>
              </div>
              <div class="faq">
                <h3>
                  The Seller Hasn't Sent My Order Yet. What Should I Do?
                  <i class="fas fa-chevron-down">
                  </i>
                </h3>
                <p>
                  Hello Stevie's Mate
                </p>
                <p>
                  What You Should Do Is ...
                </p>
                <p>
                  Find Someone Who Cares
                </p>
                <p>
                  We Dont Give A Fuck
                </p>
              </div>
              <div class="faq">
                <h3>
                  Can I Cancel A Paid Order?
                  <i class="fas fa-chevron-down">
                  </i>
                </h3>
              </div>
            </div>
          </div>

          <div class="tab-content" id="security">

            <h2>
              Found Order Issue?
            </h2>
            <p>
              Contact Us
            </p>
            <div class="contact-methods">
              <a class="contact-method" href="https://www.instagram.com" target="_blank">
                <i class="fab fa-instagram">
                </i>
                <p>
                  Instagram
                </p>
              </a>
              <a class="contact-method" href="https://www.telegram.org" target="_blank">
                <i class="fab fa-telegram-plane">
                </i>
                <p>
                  Telegram
                </p>
              </a>
              <a class="contact-method" href="https://www.whatsapp.com" target="_blank">
                <i class="fab fa-whatsapp">
                </i>
                <p>
                  Whatsapp
                </p>
              </a>
            </div>
            <div class="form-container">
              <div class="left">
                <div class="name-container">
                  <input placeholder="First Name" type="text" />
                  <input placeholder="First Name" type="text" />
                </div>
                <input placeholder="Complaint Type" type="text" />
                <input placeholder="Email" type="email" />
              </div>
              <div class="right">
                <textarea placeholder="Massage.."></textarea>
              </div>
              <button>
                SEND
              </button>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="js/suuport.js"></script>

</body>

</html>