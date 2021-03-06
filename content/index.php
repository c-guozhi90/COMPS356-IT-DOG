<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KOLpedia - Find The World Best KOL Here</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/creative.css" rel="stylesheet">

</head>

<body>
<!-- navbar for all webpage-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../main/index.php">KOLpedia</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Random Page</a>
                </li>
                <li class="nav-item">
                    <form class="navbar-form navbar-search my-lg-0" action="../searching.php">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <select class="btn btn-primary" name="keywordsType">
                                    <option class="btn" value="name" selected>Name</option>
                                    <option class="btn" value="platform">Platform</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="keywordsInput" value="">
                            <div class="input-group-btn">
                                <input type="submit" class="btn  btn-success my-2 my-sm-0" value="search">
                            </div>
                        </div>
                    </form>
                </li>

                <li class="nav-item">
                    <!--if user not yet login, show login button-->
                    <?php if(!isset($_SESSION['username']) || empty($_SESSION['username'])){ ?>
                        <a href="../login"><button class="btn btn-light text-info" name="">LOGIN</button></a>
                        <!--if user logged in , show user info and a dropdown meum for logout-->
                        <?php
                    } else {  ?>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="../login/logout.php">Logout</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
    include 'getKol.php';
    include 'showContext.php';
    $target= new kol;
    $target->findTarget();
    $targetContent = new content();
    $targetContent->findTarget();
    $max = $targetContent->getMax();
?>



<section class="bg-dark text-white" id="introduction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-emphasize"><?php $target->getName() ?></h2>
                <hr class="my-5">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-lg-left text-md-center">
                <div class="biology-box">
                    <p class="text-muted mb-lg-4 mb-md-2">Gender: <span
                                class="text-primary"><?php $target->getGender(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Platform: <span
                                class="text-primary"><?php $target->getPlatform(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Category: <span
                                class="text-primary"><?php $target->getCategory(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Follower Count:<span
                                class="text-primary"><?php $target->getFollower(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Basic Intro: <span
                                class="text-primary"><?php $target->getIntro(); ?></span></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 text-center">
                <img class="img-fluid" src="../<?php $target->getImg_folder(); ?>/01.jpg">
            </div>
        </div>
    </div>
</section>


<?php
for ($sector=1; $sector<=$max; $sector++){
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-lg-left">
                    <h2 class="section-heading text-emphasize"><span
                                class="text-primary"><?php $targetContent->getSubTitle($sector); ?></h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-lg-left">
                    <div class="biology-box">
                        <p class="text-muted mb-2" id="Content"><span
                                    class="text-muted"><?php $targetContent->getContent($sector); ?></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>


<?php
require_once "comments.php";
?>

<section class="bg-dark text-white text-center" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-center">
                <h2 class="section-heading text-emphasize">Want to know more about this KOL?</h2>
                <p class="text-muted">You should check out their social media accounts.</p>
                <hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-youtube text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-twitter text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-twitch text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x  fa-facebook-official text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-envelope-o text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-instagram text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/creative.js"></script>


</body>


</html>
