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
<div id="products" class="bg-img">
	<div class="spacer"></div>
	<div class="row">
		<div class="col-sm-5"></div>
		<div class="col-sm-10">
			<h2 class="text-center">Products</h2>
		</div>
		<div class="col-sm-5"></div>
	</div>
	<div id="contacts" class="row">
		<div class="row">
			<div class="col-sm-20">
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-5">
						<img src="res/bg/contacts-2880.jpg" class="img-rounded img-responsive">
					</div>
					<div class="col-sm-5">
						<div class="description">
							<h3>Contact Book</h3>
							<p>The heart and the control center of our product package is the Contactify Application - a sleek, user optimized contact book.The contact book app is unique in the way it automates the update of your information on the devices of all your contacts (if you so wish), thus eliminating the hassle of communicating information changes directly. Naturally, the contact book app also has import, export and extension functionalities as well as an optional calendar feature, easy edits, quick notes or selective sharing of contact information. As Contactify is highly targeted at company use, we have created simple clearance-level functionalities for large-scale selective sharing in hierarchical company networks.  </p>
						</div>
					</div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="messenger" class="row">
		<div class="row">
			<div class="col-sm-20">
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-5">
						<img src="res/bg/messenger-2880.jpg" class="img-rounded img-responsive">
					</div>
					<div class="col-sm-5">
						<div class="description">
							<h3>Messenger</h3>
							<p>The Contactify App has integrated, immediately accessible messaging features for all current, past and up-and-coming communication options (Email, SMS, MMS, cellphone, Skype, Viber, Voxer, Telegram, WhatsApp, WeChat, Baidoo and so on.) . All incoming messages are replied to on their original platform while creating a new message identifies all platforms you have in common with your contact gives you the choice. It also comes with its own in-built messaging app, the Contactify Messenger. If Contactify recognizes the name you’re trying to contact as a fellow Contactify user, if you are given the option to write per Contactify Messenger and benefit thusly from encrypted, highly secure internet messaging protocols that will make the transmitted information unreachable for hackers, governments or us, the Contactify team, alike.</p>
						</div>
					</div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="calendar" class="row">
		<div class="row">
			<div class="col-sm-20">
				<div class="row">
					<div class="col-sm-5"></div>
					<div class="col-sm-5">
						<img src="res/bg/calendar-2880.jpg" class="img-rounded img-responsive">
					</div>
					<div class="col-sm-5">
						<div class="description">
							<h3>Business Card Integration</h3>
							<p> Finally, we have implemented NFC & Bluetooth options for immediate saving of a new contact through smartphone-to-smartphone proximity – no more breaks of clumsy screen typing. In order to facilitate the transition for traditional business card users to centralized network within Contactify, we have added a card-reading functionality, which automatically analyzes and saves business card information into your contact book – networking has never been so easy!  </p>
						</div>
					</div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>