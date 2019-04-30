<?php 
include "config.php";
session_start();
unset($_SESSION['user']);

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>ViaggiApp | La web app sociale per i viaggi</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" href="vendors/popup/magnific-popup.css">
	<link rel="stylesheet" href="vendors/swiper/css/swiper.min.css">
	<link rel="stylesheet" href="vendors/scroll/jquery.mCustomScrollbar.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:600);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  font-size: 40px;
}

.text {
  position: absolute;
  width: 450px;
  left: 50%;
  margin-left: -225px;
  height: 40px;
  top: 50%;
  margin-top: -20px;
}

p {
  display: inline-block;
  vertical-align: top;
  margin: 0;
}

.word {
  position: absolute;
  width: 220px;
  opacity: 0;
}

.letter {
  display: inline-block;
  position: relative;
  float: left;
  transform: translateZ(25px);
  transform-origin: 50% 50% 25px;
}

.letter.out {
  transform: rotateX(90deg);
  transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

.letter.behind {
  transform: rotateX(-90deg);
}

.letter.in {
  transform: rotateX(0deg);
  transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.wisteria {
  color: #8e44ad;
}

.belize {
  color: #2980b9;
}

.pomegranate {
  color: #c0392b;
}

.green {
  color: #16a085;
}

.midnight {
  color: #2c3e50;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>
<!-- https://bootsnipp.com/snippets/mvyRR -->
<!-- https://www.creative-tim.com/product/paper-bootstrap-wizard?partner=114912 -->
<!-- https://designrevision.com/demo/shards/ -->
<!-- https://bootsnipp.com/snippets/4Mm5R -->
<body>
	<!--================ Canvus Menu Area =================-->
	<div class="canvus_menu">
		<div class="container">
		<br>
		<h1 style="font-family: 'Righteous', cursive; color:#877657;">ViaggiApp</h1>
			<!--<div class="toggle_icon" title="Menu Bar">
				<span></span>
			</div>-->
		</div>
	</div>
	<!--================ End Canvus Menu Area =================-->

	<section class="top-btn-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a href="signup.php" class="main_btn">
						Accedi
						<img src="img/next.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</section>

	<!--================ Start banner section =================-->
	<section class="home-banner-area relative">
		<div class="container-fluid">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="header-right col-lg-6 col-md-6">
					<div class="text" style="position:relative; bottom:40px; padding:25px;">
					  <p>Viaggiare è</p>
					  <p>
						<span class="word wisteria">tasty.</span>
						<span class="word belize">wonderful.</span>
						<span class="word pomegranate">fancy.</span>
						<span class="word green">beautiful.</span>
						<span class="word midnight">cheap.</span>
					  </p>
					</div>
					
					<a href="#" class="main_btn">
						Condividi le tue esperienze
						<img src="img/next.png" alt="">
					</a>
				</div>

				<div class="col-lg-6 col-md-6 header-left">
					<div class="">
						<img class="img-fluid w-100" src="img/banner/banner-img.jpg" alt="">
					</div>
					<div class="video-popup d-flex align-items-center">
						<a class="play-video video-play-button animate" href="https://www.youtube.com/watch?v=KUln2DXU5VE" data-animate="zoomIn"
						 data-duration="1.5s" data-delay="0.1s">
							<span></span>
						</a>
						<div class="watch">
							<h5>Entra in una community speciale</h5>
							<p>E' gratis e lo sarà per sempre</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End banner section =================-->
	<script>
	var words = document.getElementsByClassName('word');
var wordArray = [];
var currentWord = 0;

words[currentWord].style.opacity = 1;
for (var i = 0; i < words.length; i++) {
  splitLetters(words[i]);
}

function changeWord() {
  var cw = wordArray[currentWord];
  var nw = currentWord == words.length-1 ? wordArray[0] : wordArray[currentWord+1];
  for (var i = 0; i < cw.length; i++) {
    animateLetterOut(cw, i);
  }
  
  for (var i = 0; i < nw.length; i++) {
    nw[i].className = 'letter behind';
    nw[0].parentElement.style.opacity = 1;
    animateLetterIn(nw, i);
  }
  
  currentWord = (currentWord == wordArray.length-1) ? 0 : currentWord+1;
}

function animateLetterOut(cw, i) {
  setTimeout(function() {
		cw[i].className = 'letter out';
  }, i*80);
}

function animateLetterIn(nw, i) {
  setTimeout(function() {
		nw[i].className = 'letter in';
  }, 340+(i*80));
}

function splitLetters(word) {
  var content = word.innerHTML;
  word.innerHTML = '';
  var letters = [];
  for (var i = 0; i < content.length; i++) {
    var letter = document.createElement('span');
    letter.className = 'letter';
    letter.innerHTML = content.charAt(i);
    word.appendChild(letter);
    letters.push(letter);
  }
  
  wordArray.push(letters);
}

changeWord();
setInterval(changeWord, 4000);

</script>
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="vendors/popup/jquery.magnific-popup.min.js"></script>
	<script src="vendors/swiper/js/swiper.min.js"></script>
	<script src="vendors/scroll/jquery.mCustomScrollbar.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>