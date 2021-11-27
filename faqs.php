<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>|Mafundi Home|</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- mis slider -->
<link rel="stylesheet" href="css/mislider.css">
<link rel="stylesheet" href="css/mislider-custom.css">
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css" />
<!-- Owl carousel -->
<link rel="stylesheet" href="css/owl.carousel.css">
<!-- Css -->
<link rel="stylesheet" href="css/faqs.css" />
</head>
<body>
<main>

<a href="a.home.php"><img src="img/logo.png" alt=""></a>
<br>
<br>
<!-- FAQS SECTION -->
<section id="accord">
<div class="container">
<div class="card cardyb">
<div class="card-body">
<h2 class="card-title">FAQS. <em>(frequently asked questions)</em></h2>
<div class="card-text">
<div class="accordion" id="accordionExample">
<div class="card bg-transparent">
<div class="card-header" id="headingTwo">
<h2 class="mb-0">
<button id="accordbtn" type="button" class="btn btn-link animated infinite pulse delay 2s" data-toggle="collapse" data-target="#collapse1">1. How To Register As a Member?</button>                                 
</h2>
</div>
<div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
<div class="card-body">
<p>Navigate to the homepage and on the images you will find a button for sig up, Thankyou for joining Mafundi Services <a href="#" target="_blank">Learn more.</a></p>
</div>
</div>
</div>
<div class="card bg-transparent">
<div class="card-header" id="headingTwo">
<h2 class="mb-0">
<button id="accordbtn" type="button" class="btn btn-link animated infinite pulse delay 2s collapsed" data-toggle="collapse" data-target="#collapseTwo">2. How to Locate Us?</button>
</h2>
</div>
<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
<div class="card-body">
<p>This can be done throungh the contact section at the bottom of this page is wher you will find methods on how to reach us, Thanky For working with mafundi <a href="#" target="_blank">Learn more.</a></p>
</div>
</div>
</div>
<div class="card bg-transparent">
<div class="card-header" id="headingThree">
<h2 class="mb-0">
<button id="accordbtn" type="button" class="btn btn-link animated infinite pulse delay 2s collapsed" data-toggle="collapse" data-target="#collapseThree">3. Technician?</button>                     
</h2>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
<div class="card-body">
<p>If you are a fundi of technician you can join us via our page at the top of this page and click on the link. If vague you can click here to learn More <a href="#" target="_blank">Learn more.</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- END FAQS SECTION -->

<section class="question">
<div class="mainQ">
<h4>Ask A Question?</h4>
<form action="question.php" method="POST">
<textarea class="form-control" id="formy" placeholder="Your Question"></textarea>
<input type="submit" class="btny" value="Submit Question">
<input type="reset" class="btnyReset" value="Reset">
</form>
</div>
</section>

<section>
<!-- footer -->
<footer class="section-footer">
<div class="container">
<div>
<h2>Our Social Media Links.</h2>
<a href="http://twitter.com"><i class="fab fa-twitter fa-2x"></i></a>
<a href="http://youtube.com"><i class="fab fa-youtube fa-2x"></i></a>
<a href="http://facebook.com"><i class="fab fa-facebook fa-2x"></i></a>
<br>
<button id="modalBtn" class="btn">Feedback Here</button>

<div id="simplemodal" class = "modal" >
<div class="modal-content bg-dark">
<span class="closeBtn">&times;</span>

<form id="contactForm" action="contact.php" method="POST" class="form-group">
<label for="">Username</label>
<input type="text" name = "username" class = "form-control" placeholder="username" required>
<br>
<label for="">Mobile</label>
<input id="contact"
oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
name="phone" type="text" class="form-control" placeholder="format(07........)[10 digits]" minlength="10"
maxlength="10" required>
<br>
<label for="">Email Address</label>
<input type="email" name = "email" class = "form-control" placeholder="email Address" required>
<br>
<label for="">Comment</label>
<textarea name="comment" cols="30" class = "form-control" placeholder="Your Thoughts." required></textarea>
<br>
<input type="submit" class="btn btn-outline-info text-light" value="Send Message">
<input type="reset" class="btn btn-outline-secondary ml-3" value="Reset">
</form>
</div>
</div>




</div>

<div>
<h3>Mafundi Links</h3>
<ul>
<li><a href="#">Our Services</a></li>
<li><a href="#">About Us</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms Of Service</a></li>
</ul>
</div>
<div>
<h3>Our Posts</h3>
<ul>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
</ul>
</div>
<div>
<h3>Subscribe</h3>
<p>Your are welcomed to subscribe to our monthy newsletter.</p>
<form action="maillist.php" name="email-form" method="POST">
<div class="email-form">
<span class="form-control-wrap">
<input type="email" name="emailaddress" id="email" size="40" class="form-control" placeholder="Email...">
<button id="maillist" type="submit" class="form-control submit">
<a href=""><i class="fas fa-chevron-right"></i></a>
</button>
</span>
</div>
</form>
<br>
</div>
</div>
</footer>
</section>



</main>
<script src="js/faqs.js"></script>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>