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
            <h1>Seller</h1>
            <div class="dots">
                <div class="dot active"></div>                
                <div class="dot"></div>
            </div>
        </div>
        <p>Create your account</p>

        <!-- Full Name Input -->
        

        <!-- School selection and NIS input -->
        <form action="seller2.php" method="POST">
        <div class="input-group">
        <input type="text" placeholder="Full Name" name="fullName" required>
        </div>
    <div class="form-row">
        <select id="school" name="school" required>
            <option value="" disabled selected>Select your school</option>
            <option value="school1">School 1</option>
            <option value="school2">School 2</option>
            <option value="school3">School 3</option>
        </select>
        <input type="text" id="nisn" placeholder="NISN" name="nisn" required>
    </div>
    <div class="input-group phone-number">
        <input type="text" placeholder="Phone Number" name="nohp" required>
    </div>
    <div class="input-group phone-number">
        <input type="text" placeholder="alamat" name="alamat" required>
    </div>
    <div class="button">
        <button type="submit" onclick="window.location.href='seller2.php'">Next</button>
    </div>
</form>

        

        <!-- Phone Number Input with extra spacing -->
      

        <!-- Next Button -->
        
    </div>

</body>

</html>
