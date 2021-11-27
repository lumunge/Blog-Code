<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>Mafundi help|</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!--Font Awesome -->
<link rel="stylesheet" href="css/all.min.css" />
<!--Animate Css -->
<link rel="stylesheet" href="css/animate.min.css" />
<!-- Css  -->
<link rel="stylesheet" href="css/help.css" />
</head>
<body>
<main>
<a href="a.home.php"><img src="img/logo.png" alt=""></a>
<br>
<br>

<div class="container">
<h3>To Get Help Below, (click on the links)</h3>
<!-- Accordion Start -->
<div class="accordion" id="accordionExample">

<div class="card">
<div class="card-header" id="headingOne">
<h2 class="mb-0">
<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">1. How to register as a member</button>		
</h2>
</div>
<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
<div class="card-body">
<p>Navigate to our home page <a href="a.home.php">Here</a> and there you will need to register as a member with us so that you can login and book for a service, to login successfully ensure you raccount has been approved by the administrator and the registration fee paid fully. ksh 100.<a href="a.home.php" target="_blank">Learn more.</a></p>
</div>
</div>
</div>


<div class="card">
<div class="card-header" id="headingTwo">
<h2 class="mb-0">
<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">2. How to book a service?</button>
</h2>
</div>
<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
<div class="card-body">
<p>To book a service with mafundi you will be required to have an account with us and there you will find the rang eof services we offer. <a href="customerReg.php" target="_blank">Learn more.</a></p>
</div>
</div>
</div>


<div class="card">
<div class="card-header" id="headingThree">
<h2 class="mb-0">
<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">3. How to request for refunds?</button>                     
</h2>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
<div class="card-body">
<p>To request for a refund you can send a message to the admin with all details requested and your refund shall be processed within the week. <a href="a.home.php" target="_blank">Learn more.</a></p>
</div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingThree">
<h2 class="mb-0">
<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour">4. How to register as a fundi/technician</button>                     
</h2>
</div>
<div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
<div class="card-body">
<p>To register as a fundi/technician will requre you to leave us your details in the provided form here<a href="techReg.php" target="_blank">Learn more.</a></p>
</div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingThree">
<h2 class="mb-0">
<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive">5. How to locate us?</button>                     
</h2>
</div>
<div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
<div class="card-body">
<p>We are located at the mathare junction<a href="#" target="_blank">Learn more.</a></p>
</div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingThree">
<h2 class="mb-0">
<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix">6. Order hardware from us?</button>                     
</h2>
</div>
<div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
<div class="card-body">
<p>You can also purchase hardware via us instead of going the extra mile of purchasing an risking purgery / conning by various vendors.<a href="#" target="_blank">Learn more.</a></p>
</div>
</div>
</div>
</div>
<!-- End Of Accordion -->


</div>




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
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
