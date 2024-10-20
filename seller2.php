<html>

<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<?php
include "/config/connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nama_lengkap = $_POST['fullName'];
    $sekolah = $_POST['school'];
    $nisn = $_POST['nisn'];
    $no_hp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
} else {
 
    header("Location: first_page.php"); 
    exit();
}
?>

<div class="logo-containerr">
    <img src="image/WhatsApp_Image_2024-10-08_at_5.36.56_PM-removebg-preview.png" alt="Laravel logo" class="logo">
</div>
<body id="buyer" >
    <div class="container">
        <div class="header">
            <h1>Seller</h1>
            <div class="dots">
                <div class="dot"></div>
                <div class="dot active"></div>            
            </div>
        </div>
        <p>Create your account</p>
        <form action="/proses/reg_seller.php" method="POST">
    <div class="input-group">
        <input type="hidden" name="fullName" value="<?php echo htmlspecialchars($nama_lengkap); ?>">
        <input type="hidden" name="school" value="<?php echo htmlspecialchars($sekolah); ?>">
        <input type="hidden" name="nisn" value="<?php echo htmlspecialchars($nisn); ?>">
        <input type="hidden" name="nohp" value="<?php echo htmlspecialchars($no_hp); ?>">
        <input type="hidden" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>">
        <input type="email" id ="email" placeholder="Email" name="email" required>
    </div>
    <div class="input-group">
        <input type="password" placeholder="Password" id="password" name="password" required>
    </div>
    <div class="input-group">
        <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" required>
    </div>
    <div class="button">
        <button type="submit">Confirm</button>
    </div>
</form>

        
    
</body >
</html>