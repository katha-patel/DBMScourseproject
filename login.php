<?php
session_start();
$con=mysqli_connect('localhost','root','','movie');
if(isset($_POST['register']))
{
    $email=  $_POST['email'];
    $username=$_POST['username'];
    $pno=$_POST['pno'];
  	$password= $_POST['password'];
    $pass=md5($password);
    $query="SELECT * FROM `customers` WHERE `email` = '$email' AND `password`='$pass'";
    $run=mysqli_query($con,$query);
  	$row=mysqli_num_rows($run);
    	if($row==1)
    	   echo '<script>alert("email already exists")</script>';
      else {
        $query1="INSERT INTO `customers`( `name`,`pno`, `email`, `password`) VALUES ('$username','$pno','$email','$pass')";
        $run1=mysqli_query($con,$query1);
        echo '<script>alert("Registered Successfully")</script>';
      }
}
if(isset($_POST['login']))
{
  $email=  $_POST['email'];
  $_SESSION['email']=$email;
	$password= $_POST['password'];
  $pass=md5($password);
  $query="SELECT * FROM `customers` WHERE `email` = '$email' AND `password`='$pass'";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  $row1 = mysqli_fetch_assoc($run);
	if($row==1){
    if($row1['roll']=='User')
    {
   $_SESSION['person_id'] = $row1['id'];
   header('location:selectmovie.php');
 }
 if($row1['roll']=='Admin')
 {
   header('location:insertmovie.php');
 }
  }
else {
  echo '<script>alert("you have not yet Registered")</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="navbarResponsive">
  <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container-fluid">
        <br>
      <h5><b>Title</b></h5>
      <br>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <!--image -->

  </div>
  </div>
</nav>
<br>
<br>
<br>
<br>
<!-- login -->
<div class="modal-dialog text-center">
  <div class="main-section">
    <div class="modal-content">
        <div class="modal-body">
      <div class="col-12">
        <h2>Login</h2>
      </div>
      <form action="" method="post" name="login" class="needs-validation" novalidate>
        <div class="input-group mb-3">
         <input type="email" class="form-control" placeholder="Email" name="email" required>
        <div class="input-group-append">
        <span class="input-group-text">@example.com</span>
       </div>
       <div class="valid-feedback">Valid.</div>
       <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
         <input type="password" class="form-control" placeholder="password" id="pwd1" name="password" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
       </div>
       <button type="submit" class="btn btn-success" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>

      </form>
  </div>
</div>
</div>
</div>
<center>
  <br>
<lable for="reg">Create your Account Here: </lable>
<button class="btn btn-primary" data-target="#mymodel" data-toggle="modal" id="reg">Registration</button>
</center>
<br>
<br>
<!-- registration-->
<div class="container">
  <div class="modal" id="mymodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-primary">Create Your Account</h3>
          <button type="button" class="close" data-dismiss="modal">&times</button>
        </div>
       <div class="modal-body">
          <form action="" method="post" name="login" class="needs-validation" novalidate>

            <div class="input-group mb-5">
            <label for="validationCustomUsername">Name</label>
            <div class="input-group">
            <div class="input-group-prepend">
           <span class="input-group-text" id="inputGroupPrepend">@</span>
           </div>
          <input type="text" class="form-control" id="validationCustomUsername" placeholder="Name" name="username" aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
           Please enter name.
          </div>
        </div>
        </div>
        <div class="input-group mb-5">
        <label for="validationCustomUsername">Phone Number</label>
        <div class="input-group">
        <div class="input-group-prepend">
       </div>
      <input type="number" class="form-control" id="validationCustomUsername" placeholder="Phone Number" name="pno" aria-describedby="inputGroupPrepend" required>
     <div class="invalid-feedback">
       Please enter your phone number.
      </div>
    </div>
    </div>
           <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder="Your Email" name="email" required>
           <div class="input-group-append">
           <span class="input-group-text">@example.com</span>
          </div>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
           </div>
       <div class="form-group">
        <input type="password" class="form-control" placeholder="password" id="pwd2" name="password" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    <div class="modal-footer  justify-content-center">
    <button  type="submit" class="btn btn-danger" name="register">Register</button>
    </div>
       </form>
   </div>
 </div>
</div>
</div>
</div>
<br>
<br>
<footer class="page-footer font-small cyan darken-3 bg-success">
  <div class="container">
    <center>
      <br>
      <br>
        <div class="mb-5 flex-center">
          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
          </a>
        </div>
      </center>
  </div>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: KSsquare.com
  </div>

</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</body>
</html>
