<html>
<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<div class="logo-containerr">
    <img src="image/WhatsApp_Image_2024-10-08_at_5.36.56_PM-removebg-preview.png" alt="Laravel logo" class="logo">
</div>
<body id="buyer">
    <div class="container">
        <div class="header">
            <h1>Buyer</h1>
            <div class="dots">
                <div class="dot active"></div>
                <div class="dot"></div>
            </div>
        </div>
        <p>Create your account</p>
        <form action="buyer2.php" method="POST">
        <div class="input-group">
            <input name="nama_lengkap" type="text" placeholder="Full Name" required>
        </div>
        <div class="input-group">
            <input name="email" type="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <input name="no_telp" type="text" placeholder="Phone Number" required>
        </div>
        <div class="input-group">
            <input name="alamat" type="text" placeholder="Address" required>
        </div>
        <div class="button">
            <button type="submit">Next</button>
        </div>
      </form> 
    </div>
</body>
</html>
