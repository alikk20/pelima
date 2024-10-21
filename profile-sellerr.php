<html>

<head>
  <title>
    Account Profile
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/profile-page.css">
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
            Profile
          </div>
          <div class="tab-button" id="products-button" onclick="showTab('products')">
            Products
          </div>
          <div class="tab-button" id="services-button" onclick="showTab('services')">
            Services
          </div>
        </div>
        <div class="content">
          <div class="tab-content active" id="profile">
            <div class="info">
              <div class="left">
                <img alt="Profile Image" height="150"
                  src="https://imgcdn.stablediffusionweb.com/2024/3/18/df6bf2ff-32c8-42e4-89a1-30ff8b7db570.jpg"
                  width="150" />
                <button>Change Image</button>
              </div>
              <div class="details">
                <h2>
                  Full Name
                </h2>
                <p>
                  ARI
                  <span class="edit" onclick="showEditForm('edit-name-form')">
                    edit
                  </span>
                </p>
                <div class="edit-form" id="edit-name-form">
                  <input placeholder="Full Name" type="text" value="ARI" />
                  <button onclick="showEditForm('')">
                    Save
                  </button>
                </div>
                <h2>
                  Gender
                </h2>
                <p style="">
                  laki laki
                  <span class="edit" onclick="showEditForm('edit-gender-form')">
                    edit
                  </span>
                </p>
                <div class="edit-form" id="edit-gender-form">
                  <input placeholder="Gender" type="text" value="laki laki" />
                  <button onclick="showEditForm('')">
                    Save
                  </button>
                </div>
                <h2>
                  Contact Details
                </h2>
                <p style="">
                  Email: ariair@gmail.com
                  <span class="edit" onclick="showEditForm('edit-email-form')">
                    edit
                  </span>
                </p>
                <div class="edit-form" id="edit-email-form">
                  <input placeholder="Email" type="email" value="ariair@gmail.com" />
                  <button onclick="showEditForm('')">
                    Save
                  </button>
                </div>
                <p>
                  Phone Number: 012345678911
                  <span class="edit" onclick="showEditForm('edit-phone-form')">
                    edit
                  </span>
                </p>
                <div class="edit-form" id="edit-phone-form">
                  <input placeholder="Phone Number" type="tel" value="012345678911" />
                  <button onclick="showEditForm('')">
                    Save
                  </button>
                </div>
              </div>
            </div>
            <div class="address">
              <h2>
                Address Details
              </h2>
              <button class="change-image-btn" onclick="showAddAddressForm()"
                style="padding: 5px 10px; font-size: 14px;">
                Add Address
              </button>
              <div class="edit-form" id="add-address-form">
                <input placeholder="City & District" type="text" />
                <input placeholder="Full Address" type="text" />
                <button onclick="showEditForm('')">
                  Save
                </button>
              </div>
              <p>
                <span class="bold-text">City &amp; District:</span> Yogyakarta, Depok District
                <span class="edit" onclick="showEditForm('edit-city-form')">
                  edit
                </span>
              </p>
              <div class="edit-form" id="edit-city-form">
                <input placeholder="City & District" type="text" value="Yogyakarta, Depok District" />
                <button onclick="showEditForm('')">
                  Save
                </button>
              </div>
              <p>
                <span class="bold-text">Full Address:</span> Jl. STM Pembangunan, Mrican, Caturtunggal, Kec. Depok,
                Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                <span class="edit" onclick="showEditForm('edit-address-form')">
                  edit
                </span>
              </p>
              <div class="edit-form" id="edit-address-form">
                <input placeholder="Full Address" type="text"
                  value="Jl. STM Pembangunan, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281" />
                <button onclick="showEditForm('')">
                  Save
                </button>
              </div>
            </div>
          </div>
          <div class="tab-content" id="products">
            <div class="header-row">
              <h2>
                Change Password
              </h2>
              <div class="forgot-password">
                <a href="#">
                  Forgot Password?
                </a>
              </div>
            </div>
            <div class="form-group">
              <label for="old-password">
                Old Password
              </label>
              <div class="input-icon">
                <input id="old-password" type="password" value="********" />
                <i class="fas fa-eye" onclick="togglePasswordVisibility('old-password', this)">
                </i>
              </div>
            </div>
            <div class="form-group">
              <label for="new-password">
                New Password
              </label>
              <div class="input-icon">
                <input id="new-password" type="password" value="budiono siregar" />
                <i class="fas fa-eye" onclick="togglePasswordVisibility('new-password', this)">
                </i>
              </div>
              <div class="requirements">
                <ul>
                  <li>
                    Minimum characters
                    <span>
                      8
                    </span>
                  </li>
                  <li>
                    One uppercase character
                  </li>
                  <li>
                    One lowercase character
                  </li>
                  <li>
                    One special character
                  </li>
                  <li>
                    One number
                  </li>
                </ul>
              </div>
            </div>
            <div class="form-group">
              <label for="confirm-password">
                Confirm New Password
              </label>
              <div class="input-icon">
                <input id="confirm-password" placeholder="enter your confirm new password" type="password" />
                <i class="fas fa-eye" onclick="togglePasswordVisibility('confirm-password', this)">
                </i>
              </div>
            </div>
            <button class="btn">
              Change Password
            </button>
          </div>
          <div class="tab-content" id="services">
            <div class="header-row">
              <h2>
                tesfsdsd
              </h2>
              <div class="forgot-password">
                <a href="#">
                  Forgot Password?
                </a>
              </div>
            </div>
            <div class="form-group">
              <label for="old-password">
                Old Password
              </label>
              <div class="input-icon">
                <input id="old-password" type="password" value="********" />
                <i class="fas fa-eye" onclick="togglePasswordVisibility('old-password', this)">
                </i>
              </div>
            </div>
            <div class="form-group">
              <label for="new-password">
                New Password
              </label>
              <div class="input-icon">
                <input id="new-password" type="password" value="budiono siregar" />
                <i class="fas fa-eye" onclick="togglePasswordVisibility('new-password', this)">
                </i>
              </div>
              <div class="requirements">
                <ul>
                  <li>
                    Minimum characters
                    <span>
                      8
                    </span>
                  </li>
                  <li>
                    One uppercase character
                  </li>
                  <li>
                    One lowercase character
                  </li>
                  <li>
                    One special character
                  </li>
                  <li>
                    One number
                  </li>
                </ul>
              </div>
            </div>
            <div class="form-group">
              <label for="confirm-password">
                Confirm New Password
              </label>
              <div class="input-icon">
                <input id="confirm-password" placeholder="enter your confirm new password" type="password" />
                <i class="fas fa-eye" onclick="togglePasswordVisibility('confirm-password', this)">
                </i>
              </div>
            </div>
            <button class="btn">
              Change Password
            </button>
          </div>
        </div>5yth
      </div>
    </div>
  </div>
  </div>
  <script src="js/profile-page.js"></script>

</body>

</html>