
<?php
session_start();

if(!isset($_SESSION['email'])){
    // header('location: ../loginn.php');
    //po opo
}
?>

<!DOCTYPE html>
<html>
<body>

<?php
// Variabel sesi gema yang ditetapkan pada halaman sebelumnya
echo "Login sebagai " . $_SESSION [ "nama_lengkap" ] . ".<br>" ;
echo "Emailku " . $_SESSION [ "email" ] . "." ;
?>

</body>
</html>

<center><h1>ARIJUALFLYOVERJANTI</h1></center>