<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <div class="homebutton">
      <a class="navbar-brand" href="index.php"><img src="res/logo/main-450.png"/></a>
    </div>
    </div>
    
    <div class="collapse navbar-collapse" id="navbar-main">
      <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">COMPANY
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
            <li><a href="company.php">General</a></li>
            <li><a href="company.php#team">Team</a></li>
            <li><a href="company.php#location">Contact us</a></li>
          </ul>
        </li>
        <!--<li><a href="#" class="divider"></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">PRODUCTS
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="products.php">Contact Book</a></li>
            <li><a href="products.php#messenger">Messages</a></li>
            <li><a href="products.php#calendar">Calendar</a></li> 
          </ul>
        </li>-->
      </ul>
      <!--<ul class="nav navbar-nav navbar-right">
	      <li><a href="#" id="registerButton" data-toggle="modal" data-target="#register-modal"><span class="glyphicon glyphicon-plus"> Register</span></a></li>
	      <li><a href="#" class="divider"></a></li>
        <li><a href="#" id="loginButton" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-user"> Login</span></a></li>
      </ul>-->
    </div>
  </div>
</nav>
<!-- Registration and Login Form -->
<?php include('modalLoginRegister.php');?>