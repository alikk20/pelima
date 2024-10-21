<style>
    div.page-content{
        width: 90%;
        margin-top: 160px;
        margin-left: 90px;
        height: auto;
    }


    .main-page .panel-main{
        border-radius: 25px;
        padding: 20px;
        margin: 10px;
    }

    .main-page .panel-cream{
        background-color: #FCEFE4;
    }

    .main-page .panel-mustard{
        background-color: #EAE2B7;
    }

    .main-page .panel-orange{
        background-color: #F77F00;
    }

    .main-page .panel-top{
        height: 20vh;
    }

    .main-page .panel-bot .panel-main{
        height: 50vh;
    }

    .main-page .panel-bot .hero2{
        padding: 0;
    }


    .main-page .panel-bot .hero3{
        background-image: url('./image/dump/team.png');
        background-repeat: no-repeat;
        background-position: right bottom; 
        background-size: 85%;
    }

</style>    

<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
<meta http-equiv="refresh" content="" >
<meta name=”apple-mobile-web-app-capable” content=”yes “>
</head>
<body>
    <header>
        <?php include("navbar.php") ?>
    </header>
    <div class="page-content">
        <div class="d-flex flex-column main-page justify-content-between ">
            <div class="d-flex flex-row panel-top w-100">
                <div class="panel-main panel-cream w-50">
                    <h2><b>Popular Services</b></h2>
                </div>
                <div class="panel-main panel-mustard w-50 d-inline-flex justify-content-between">
                    <div class="hero1title w-50 d-flex">
                        <h3 class="align-self-center"><b>Products made by Students</b></h3>
                    </div>
                    <div class="hero1 w-50 d-flex h-75">
                        <img class="img-fluid align-self-center" src="./image/dump/mesin.png" />
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row panel-bot w-100">
                <div class="w-25">
                    <div class="panel-main panel-orange d-flex flex-column">
                        <h1 class="mb-auto"><b>Ayo Kentet bersama Stevie</b></h1>
                        <h2>Daftar Sekarang!</h2>
                    </div>
                </div>
                <div class="w-25">
                    <div class="panel-main panel-cream hero2 d-flex align-items-end">
                        <img class="img-fluid" src="./image/dump/aji2.png" />
                    </div>
                </div>
                <div class="w-50">
                    <div class="panel-main panel-cream hero3">
                        <h1><b>What We do? <br> Get to Know <br>Us</b></h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>