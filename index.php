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

<div id="general" class="page-full bg-img">
  <div class="bottom-pos">
	<div class="row content-ftr bg-primary" >
		<div class="col-sm-20" >
			<div class="row" >
				<div class="col-sm-5"></div>
				<div class="col-sm-10" >
					<p>Business starts with a firm handshake – and then?  </p>
					<h2>Contactify</h2>
					<p>The one platform to manage your network. All your contacts, business cards, communication channels and messages, cut down to the essentials and integrated into a single application, simple, elegant and secure. </p>
				</div>
				<div class="col-sm-5"></div>
			</div>
		</div>
	</div>
  </div>
</div>


</body>
</html>