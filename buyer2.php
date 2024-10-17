<html>

<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
} else {
    header("Location: ../buyer.php"); 
    exit();
}
?>
<div class="logo-containerr">
    <img src="image/WhatsApp_Image_2024-10-08_at_5.36.56_PM-removebg-preview.png" alt="Laravel logo" class="logo">
</div>
<body id="buyer" >
    <div class="container">
        <div class="header">
            <h1>Buyer</h1>
            <div class="dots">
                <div class="dot"></div>
                <div class="dot active"></div>            
            </div>
        </div>
        <p>Create your account</p>
        <form action='/proses/reg_buyer.php' method='POST'>
        <div class="input-group">
            <input type="hidden" name="nama_lengkap" value="<?php echo htmlspecialchars($nama_lengkap); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <input type="hidden" name="no_telp" value="<?php echo htmlspecialchars($no_telp); ?>">
            <input type="hidden" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>">
        </div>
        <div class="input-group">
            <input name="passwd" type="password" placeholder="Password" id="password">
        </div>
        <div class="input-group">
            <input name="cpasswd" type="password" placeholder="Confirm Password" id="confirm-password">
        </div>
        <div class="button">
            <button type="button" onclick="window.history.back();">Previous</button>   
            <button type="submit">Confirm</button>             
        </div>
        </form>
    </div>
</body >
</html>