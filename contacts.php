<?php
    
    require('php/core.php');
    require('php/auth.php');
    
    var_dump($auth);
    //if(!$auth)
    //    header('Location: index.php');
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

<nav class="navbar">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#searchbar">
        <span class="caret"></span>
      </button>
    </div>
    </div>
    <div class="collapse navbar-collapse" id="searchbar">
      <ul class="nav navbar-nav">
        <li><a href="#" id="addButton" data-toggle="modal" data-target="#register-modal">Add</a></li>
        <li><a href="#" class="divider"></a></li>
        <li><a href="#" id="sortFirstButton" data-toggle="modal" data-target="#login-modal">Sort by First Name</a></li>
        <li><a href="#" class="divider"></a></li>
        <li><a href="#" id="sortLastButton" data-toggle="modal" data-target="#login-modal">Sort by Last Name</a></li>
        <li><a href="#" class="divider"></a></li>
        <li class="searchButton"><input type="text" placeholder="Search" name="search" style="border:none; text-align:center"></li>
      </ul>
    </div>
</nav>

<div class="row" style="margin-top: 50px">
    <div class="col-sm-1">
    <div class="spacer"></div>
    <div class="container alphabetSearch" style="max-height: 89vh">
            <div class="btn-toolbar">
                <div class="btn-group-vertical btn-group-sm">
                  <button class="btn btn-default letter">A</button>
                  <button class="btn btn-default letter">B</button>
                  <button class="btn btn-default letter">C</button>
                  <button class="btn btn-default letter">D</button>
                  <button class="btn btn-default letter">E</button>
                  <button class="btn btn-default letter">F</button>
                  <button class="btn btn-default letter">G</button>
                  <button class="btn btn-default letter">H</button>
                  <button class="btn btn-default letter">I</button>
                  <button class="btn btn-default letter">J</button>
                  <button class="btn btn-default letter">K</button>
                  <button class="btn btn-default letter">N</button>
                  <button class="btn btn-default letter">O</button>
                  <button class="btn btn-default letter">P</button>
                  <button class="btn btn-default letter">Q</button>
                  <button class="btn btn-default letter">R</button>
                  <button class="btn btn-default letter">S</button>
                  <button class="btn btn-default letter">T</button>
                  <button class="btn btn-default letter">U</button>
                  <button class="btn btn-default letter">V</button>
                  <button class="btn btn-default letter">W</button>
                  <button class="btn btn-default letter">X</button>
                  <button class="btn btn-default letter">Y</button>
                  <button class="btn btn-default letter">Z</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-19">
        <ul class="list-group" id="allContacts">
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>

            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
            <?php include('userContact.php'); ?>
        </ul>
    </div>

    <!-- Registration and Login Form -->
<?php include('add.php');?>

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