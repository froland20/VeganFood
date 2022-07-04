<!DOCTYPE html>
<?php

error_reporting(0);

session_start();

require('include/connection.php');
require('include/functions.php');
require('include/user_login.php');


?>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <meta name="keywords" content="" />
  <meta name="description" content="<?php echo $siteSettings['site_description']; ?>" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="./appearance/images/favicon.png" type="">

  <title> <?php echo $siteSettings['site_title']; ?> </title>

  <link rel="stylesheet" type="text/css" href="./appearance/css/bootstrap.css" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />

  <link href="./appearance/css/font-awesome.min.css" rel="stylesheet" />

  <link href="./appearance/css/style.css" rel="stylesheet" />
  
  <link href="./appearance/css/responsive.css" rel="stylesheet" />

</head>

<?php 

	// az oldal fejléc stílusa az alapján van eldöntve, hogy az oldal a főoldal-e, minden más esetben egy rövidebb felső sáv látszik az oldalon
	echo (!isset($_GET['p']) ? '<body>' : '<body class="sub_page">');
	
	// az alapértelmezett oldal amit bekér az index.php az a: home.php, amennyiben a "p" megvan adva az urlben, úgy az oldal azt tölti be
	$page = isset($_GET['p']) && file_exists('pages/'.$_GET['p'] . '.php') ? 'pages/'.$_GET['p'] : 'pages/home';
	
	// minden esetben megköveteljük, hogy az oldal fejléce, menüje be legyen kérve
	require('include/header.php'); 
	
	// megmutatjuk az épp megnyitott oldalt
	require ($page.'.php');
	
	// minden esetben megköveteljük, hogy az oldal lábléce be legyen kérve
	require('include/footer.php'); 
	
?>

  <script src="./appearance/js/jquery-3.4.1.min.js"></script>
  <script src="./appearance/js/register.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="./appearance/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="./appearance/js/custom.js"></script>

</body>

</html>