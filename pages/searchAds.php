<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/fontawesome-all.css" rel="stylesheet">
    <link href="../css/swiper.css" rel="stylesheet">
	<link href="../css/magnific-popup.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
    <link href="../css/cards.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="../images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand logo-text page-scroll" href="home.php"> <?php include "../php/connect.php"; session_start(); $nickname = $_SESSION['nickname']; echo $nickname;?></a>
            
            <span id="1" class="fa fa-star"></span>
            <span id="2" class="fa fa-star"></span>
            <span id="3" class="fa fa-star"></span>
            <span id="4" class="fa fa-star"></span>
            <span id="5" class="fa fa-star"></span>

            <script>
            if (<?php echo $_SESSION['rating'];?> > 0) {
                if (<?php echo $_SESSION['rating'];?> >= 1) document.getElementById("1").className += " checked";
                if (<?php echo $_SESSION['rating'];?> >= 2) document.getElementById("2").className += " checked";
                if (<?php echo $_SESSION['rating'];?> >= 3) document.getElementById("3").className += " checked";
                if (<?php echo $_SESSION['rating'];?> >= 4) document.getElementById("4").className += " checked";
                if (<?php echo $_SESSION['rating'];?> == 5) document.getElementById("5").className += " checked";
            }
            </script>
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll mt-2" onclick="pastActivities()">PAST ACTIVITIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll mt-2" onclick="myEvents()">MY EVENTS<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll mt-2" onclick="myAds()">MY ADS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll mt-2" onclick="searchEvent()">SEARCH EVENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll mt-2" onclick="searchAd()">SEARCH ADS</a>
                    </li>
                    <span class="nav-item">
                        <button class="btn-outline-sm page-scroll" onclick="create()">+</button>
                    </span>
                </ul>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <h1>Search Ads</h1>
                        <p class="p-large p-heading">Here you can find all the Ads posted by other users</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <div class="deco-white-circle-1">
            <img src="../images/decorative-white-circle.svg" alt="alternative">
        </div> <!-- end of deco-white-circle-1 -->
        <div class="deco-white-circle-2">
            <img src="../images/decorative-white-circle.svg" alt="alternative">
        </div> <!-- end of deco-white-circle-2 -->
        <div class="deco-blue-circle">
            <img src="../images/decorative-blue-circle.svg" alt="alternative">
        </div> <!-- end of deco-blue-circle -->
        <div class="deco-yellow-circle">
            <img src="../images/decorative-yellow-circle.svg" alt="alternative">
        </div> <!-- end of deco-yellow-circle -->
        <div class="deco-green-diamond">
            <img src="../images/decorative-green-diamond.svg" alt="alternative">
        </div> <!-- end of deco-yellow-circle -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <?php
    $sql = "SELECT * FROM Ads WHERE creator!='$nickname' ORDER BY Ads.price";
        $res = $conn->query($sql);
         while($row = $res->fetch_assoc()) {
            $id = $row['id'];
            $creator = $row['creator'];
            $name = $row['name'];
            $description = $row['description'];
            $needed_people = (int)$row['needed_people'];
            $joined_people = (int)$row['joined_people'];
            $price = (double)$row['price'];
            echo "<div class='courses-container'>
            <div class='course'>
                <div class='course-preview_2'>
                    <h6>Ad</h6>
                    <h2>$creator</h2>
                    <a onclick='descAd($id, \" $name \", \" $description \")'>Description<i class='fas fa-chevron-right'></i></a>
                </div>
                <div class='course-info'>
                    <div class='progress-container'>
                        <div";
                        if ($joined_people==0) echo " class='progress_0'></div>";
                        else if ($joined_people/$needed_people < 0.25) echo " class='progress_1'></div>";
                        else if ($joined_people/$needed_people < 0.50) echo " class='progress_2'></div>";
                        else if ($joined_people/$needed_people < 0.75) echo " class='progress_3'></div>";
                        else if ($joined_people/$needed_people < 0.95) echo " class='progress_4'></div>";
                        else if ($joined_people/$needed_people == 1) echo " class='progress_5'></div>";
                        echo "<span class='progress-text'>
                        $joined_people/$needed_people have joined
                        </span>
                    </div>
                    <h6>$price € </h6>
                    <h2>$name</h2>
                    <button class='btn_join' onclick='joinAd($id, \" $name \")'>JOIN</button>
                </div>
            </div>
            </div>";
            }
    ?>

    <div class="modal fade" id="choose" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticRatingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticRatingLabel">Choose an Activity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="rounded  mt-5 mb-5 text-center">
            <span class="nav-item">
                <button class="btn-outline-sm page-scroll" onclick="createEvents()">Event</button>
            </span>
            <span class="nav-item">
                <button class="btn-outline-sm page-scroll" onclick="createAds()">Ad</button>
            </span>
        </div>   
        </div>
        </div>
    </div>

    <div class="modal fade" id="desc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticRatingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="descLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="rounded  mt-5 mb-5 text-center">
        <p id="descText"></p>
        </div> <h5 class="text-center">PARTICIPANTS</h5>
        <div class="rounded  mt-5 mb-5 text-center">
        <p id="descPart"></p>
        </div>  
        </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="../js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="../js/scripts.js"></script> <!-- Custom scripts -->
    <script src="../js/home.js"></script> <!-- Custom scripts -->
</body>
</html>