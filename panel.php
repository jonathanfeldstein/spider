<?php
	
	require('php/core.php');
	require('php/auth.php');
	
	var_dump($auth);
	if(!$auth)
		header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include('header.php'); ?>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="alertCont"></div>

<!-- navigation bar once logged in -->
<?php include('navbarLogin.php'); ?>



<script type="text/javascript">
	$('#logoutButton').click(function(){
		$.ajax({
			url: 'php/logout.php',
			method: 'post',
		}).done(function(ret){
			if(ret.status == 's'){
				location.reload();
			}
		});
	});
</script>

</body>
</html>