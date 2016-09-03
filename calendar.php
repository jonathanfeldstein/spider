<?php
    
    require('php/core.php');
    require('php/auth.php');
    
    var_dump($auth);
    //if(!$auth)
        //header('Location: index.php');
    //var_dump($auth);
    //die();
?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include('header.php'); ?>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="alertCont"></div>

<!-- navigation bar once logged in -->
<?php include('navbarLogin.php'); ?>


<div class="row">
	<div class="col-sm-5"></div>
	<div class="col-sm-10">
		<div class="orgCalendar"></div>
	</div>
	<div class="col-sm-4"></div>
</div>

<script type="text/javascript">
	$('.orgCalendar').fullCalendar({
		
	});
	
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