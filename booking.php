<?php
session_start();
$con=mysqli_connect('localhost','root','','movie');
if(isset($_GET['movie_id']))
{
  $movie_id = $_GET['movie_id'];
  $_SESSION['movie_id']=$movie_id;
  $query="SELECT * FROM `mov` where `mov_id`='$movie_id'";
  $run=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($run);
  $_SESSION['mov_name']=$row['name'];
  $query3 = "SELECT sum(`seats`) FROM `booking` GROUP BY `movie_id` HAVING `movie_id`='$movie_id'";
  $run3=mysqli_query($con,$query3);
  $row3=mysqli_fetch_assoc($run3);
  $set= $row3['sum(`seats`)'];
  if($set>=10)
  {
    echo '<script>alert("No Seats Available")</script>';
    header('location:selectmovie.php');
  }
}
if(isset($_POST['confirm']))
{
  $seats = $_POST['seats'];
  if($set+$seats<10)
  {
  $time = $_POST['options'];
  $date = $_POST['options1'];
  $movie_id = $_GET['movie_id'];
  $theater = $_POST['hall'];
  $seats = $_POST['seats'];
  $person_id = $_SESSION['person_id'];
  $email = $_POST['email'];
  $query2 ="INSERT INTO `booking`(`time`, `date`, `movie_id`, `hall`, `seats`, `person_id`,`email`) VALUES ('$time','$date','$movie_id','$theater','$seats','$person_id','$email')";
  $run=mysqli_query($con,$query2);
  if($run)
  {
    $query1 = "SELECT `b_id` FROM `booking` WHERE `movie_id` = '$movie_id' and `person_id` = '$person_id'";
    $run1=mysqli_query($con,$query1);
    $row1 = mysqli_fetch_assoc($run1);
    $_SESSION['book_id'] = $row1['b_id'];
    $_SESSION['which']=1;
    header('location:payment.php');
  }
}
else {
  echo '<script>alert("No Seats Available")</script>';
  header('location:selectmovie.php');
}
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Booking</title>
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
<div class="row">
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
<div class="col-sm-8 col-md-8 col-xs-8 col-lg-8">
<div class="row">
  <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
  <div class="container-fluid padding">
    <div class="row padding">
        <div class="card">
          <img class="card-img-middle" src="<?php echo $row['img_url']; ?>" height="500">
        </div>
    </div>
  </div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
  <br>
<h3><b><?php echo $row['name']; ?></b></h3>
<br>
<br>
<form action="#" method="post" name="login" id="submit">
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-outline-info ">
    <input type="radio" name="options" value="9:00AM" id="9:00AM">9:00 AM
  </label>
  <label class="btn btn-outline-info">
    <input type="radio" name="options" value="1:00PM" id="1:00PM"> 1:00 PM
  </label>
  <label class="btn btn-outline-info">
    <input type="radio" name="options" value="6:00PM" id="6:00PM"> 6:00 PM
  </label>
  <label class="btn btn-outline-info">
    <input type="radio" name="options" value="10:00PM" id="10:00PM"> 10:00 PM
  </label>
</div>
<br>
<br>
<br>


<div class="btn-group btn-group-toggle btn-group-lg" data-toggle="buttons">
  <label class="btn btn-outline-info" >
    <input type="radio" name="options1" value="5 May" id="option1"> Today
  </label>
  <label class="btn btn-outline-info" >
    <input type="radio" name="options1" value="6 May" id="option2"> 6 May
  </label>
  <label class="btn btn-outline-info" >
    <input type="radio" name="options1" value="7 May" id="option3"> 7 May
  </label>
</div>
<br>
<br>
<div class="form-group">

<br>
<select class="custom-select custom-select-lg mb-3" name="hall">
<option selected>Select Theater</option>
<option value="City Pride: Satara Road">City Pride: Satara Road</option>
<option value="PVR: City One Mall,Pimpri">PVR: City One Mall,Pimpri</option>
<option value="Rahul 70 MM: Shivajinagar,Pune">Rahul 70 MM: Shivajinagar,Pune</option>
<option value="PVR: Phoenix Market City,Pune">PVR: Phoenix Market City,Pune</option>
<option value="INOX: Bund Garden Road">INOX: Bund Garden Road</option>
</select>

</div>
<div class="row">
<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
<div class="form-group">
<label for="seats">Seats:</label>
<input type="number" style="height:50px; width:100px;"  name="seats"  placeholder="0" class="form-control" >
  </div>
</div>
<div class="col-sm-8 col-md-8 col-xs-8 col-lg-8">
  <div class="form-group">
  <label for="email">Email:</label>
  <input type="email" style="height:50px;"  name="email"  placeholder="xyz@abc.op" class="form-control" >
    </div>
</div>
</div>
<br><br>

</div>
</div>
</div>
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
</div>
<br>
<br>
<div class="row">
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
<div class="col-sm-8 col-md-8 col-xs-8 col-lg-8">
  <center>
  <img src="https://www.edrawsoft.com/templates/images/cinema-seating-plan.png" class="img-fluid" alt="Responsive image">
</center>
<br>
<br>
<br>
<center>
<div class="form-group">
  <button class="btn btn-warning btn-lg" type="submit" name="confirm">Confirm Booking</button>
</div>
</center>
</form>
</div>
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
</div>
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
