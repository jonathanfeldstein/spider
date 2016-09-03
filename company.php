<?php
	require('php/core.php');
	require('php/auth.php');
	if($auth)
		header('Location: panel.php');
?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include('header.php'); ?>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="alertCont"></div>

<!-- navigation bar -->

<?php include('navbar.php'); ?>
<div id="infogeneral" class="page-full bg-img">
  <div class="bottom-pos">
	<div class="row content-ftr bg-primary">
		<div class="col-sm-20">
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-10">
					<h2>General</h2>
					<p>In the age of growing awareness around the value of time and data as truly valuable commodities, it is remarkable how archaic the way we manage our network has remained. 
Multiple contact books, piles of business card information, clumsy excel sheets, a plethora of newly appearing or disappnaring communication channels and social media platforms as well as the linked passwords: Increasingly, the inherent inefficiencies of the way we are organizing our networks are heavily diluting the daily interactions of private as well as business relationships. 
Contactify solves this problem – its automated integration of all contact books and all messaging platform allows YOU to make a clean sweep and take back control of your network. Combining a sleek, functional networking platform with the option of new digital business cards and various business card recognition technologies, Contactify is looking to revolutionize the way business networks are maintained, expanded and accessed.  
As a Swiss-based and Swiss-inspired ETH Zurich technology startup, Contactify naturally seeks to uphold the highest standards of security and confidentiality, both in term of data storage and in terms of data transfer. As such, we additionally developed the Contactify Messenger, which allows two Contactify users to communicate via high-end encryption protocols. 
What is your network worth? 
</p>
<p>One app, one card, one messenger – Contactify: Empower Your Network</p>
				</div>
				<div class="col-sm-5"></div>
			</div>
		</div>
	</div>
  </div>
</div>
<div id="team" class="page-full bg-img">
	<div>
		<div class="container panel text-center">
		  <h2>The Team</h2>
		  <br>
			<div class="row">
			  <div class="col-sm-4">
			    <img src="res/profile/ljf.jpg" class="img-circle person" alt="Random Name">
			    <p><strong>L. Jonathan Feldstein</strong></p>
			    <div class="">
				    <small>
				    <p>Founder & CEO</p>
				    <p>MSc Mechanical Engineering</p>
				    <p>ETH Zürich</p></small>
			    </div>
			  </div>
			  <div class="col-sm-4">
			    <img src="res/profile/nicco.jpg" class="img-circle person" alt="Random Name">
			    <p><strong>Niccoló Borgioli</strong></p>
			    <div class="">
				    <small>
				    <p>Developer (Database & Security)</p>
				    <p>BSc Electrical Engineering</p>
				    <p>ETH Zürich</p></small>
			    </div>
			  </div>
			  <div class="col-sm-4">
			    <img src="res/profile/lasse.jpg" class="img-circle person" alt="Random Name">
			    <p><strong>Lasse Lingens</strong></p>
			    <div class="">
				    <small>
				    <p>Developer (API) </p>
				    <p>BSc Computer Science</p>
				    <p>ETH Zürich</p></small>
			    </div>
			  </div>
			    <div class="col-sm-4">
			    <img src="res/profile/amu.jpg" class="img-circle person" alt="Random Name">
			    <p><strong>Avik Mukhija</strong></p>
			    <div class="">
				    <small>
				    <p>Developer (UI)</p>
				    <p>BSc Computer Science</p>
				    <p>ETH Zürich</p></small>
			    </div>
			  </div>
			  <div class="col-sm-4">
			    <img src="res/profile/lennart.jpg" class="img-circle person" alt="Random Name">
			    <p><strong>Lennart van der Goten</strong></p>
			    <div class="">
				    <small>
				    <p>Developer (Server & API)</p>
				    <p>MSc Computer Science</p>
				    <p>ETH Zürich</p></small>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>

<div id="location" class="page-full bg-img">
  <div class="bottom-pos">
	<div class="row content-ftr bg-primary">
		<div class="col-sm-20">
			<div class="row">
				<div class="col-sm-8"></div>
				<div class="col-sm-3">
					<h2>Contact us</h2>
					<p>info@contactify.ch</p>
					<p>Tannenrauchstr.35</p>
					<p>8038 Zürich</p>
					<p>Switzerland</p>
				</div>
				<div class="col-sm-9"></div>
			</div>
		</div>
	</div>
  </div>
</div>

</body>
</html>