<?php
session_start();
$con=mysqli_connect('localhost','root','','movie');
$query="SELECT * FROM `mov`";
$run=mysqli_query($con,$query);

if(isset($_POST['view']))
{
  $b_id1 = $_POST['b_id1'];
  $query3 = "SELECT * FROM `booking` WHERE `b_id`='$b_id1'";
  $run3=mysqli_query($con,$query3);
  $row3=mysqli_num_rows($run3);
  if($row3)
  {
    $b_id1 = $_POST['b_id1'];
    $_SESSION['b_id1']=$b_id1;
    $_SESSION['which']=0;
    header('location:ticket.php');
  }
  else {
    echo '<script>alert("No Such Booking Id Found")</script>';
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Select Movie</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="navbarResponsive">
  <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container-fluid">
      <h5><b>Title</b></h5>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-target="#mymodel" data-toggle="modal">Cancel Booking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-target="#examplemodal" data-toggle="modal">Fetch Ticket</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<br>
<br>
<br>
<br>
<div class="row">
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
<div class="col-sm-8 col-md-8 col-xs-8 col-lg-8">
<?php
if(isset($_POST['delete']))
{
  if(isset($_POST['b_id']))
  {
    $b_id = $_POST['b_id'];
    $query2 = "SELECT * FROM `booking` WHERE `b_id`='$b_id'";
    $run2 = mysqli_query($con,$query2);
    $row2=mysqli_num_rows($run2);
  if($row2)
  {
    $query1 = "DELETE FROM `booking` WHERE `b_id`='$b_id'";
    $run1=mysqli_query($con,$query1);
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Booking Cancel!</strong> Your booking is Successfully Cancelled and will be refunded within 24 hours.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}
else {
  echo '<script>alert("No Such Booking Id Found")</script>';
}
}
}
  ?>
</div>
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
</div>
<?php
   while($row=mysqli_fetch_assoc($run))
   {
 ?>
  <div class="container-fluid">
    <div class="row">
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
<div class="col-sm-8 col-md-8 col-xs-8 col-lg-8">
<div class="card mb-3" style="max-width: 1000px;">
  <div class="row no-gutters">
    <div class="col-md-5">
      <img src="<?php echo $row['img_url']; ?>" class="card-img" alt="loading...">
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h4 class="card-title"><b><?php echo $row['name']; ?></b></h4>
        <br>
        <p class="card-text"><?php echo $row['description']; ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Genre : </b><?php echo $row['genre']; ?></li>
        <li class="list-group-item"><b>Rating : </b><?php echo $row['rating']; ?></li>
        <li class="list-group-item"><b>Language : </b><?php echo $row['lang']; ?></li>
        <li class="list-group-item"><b>Duration : </b><?php echo $row['duration']; ?></li>
        <li class="list-group-item"><b>Release on : </b><?php echo $row['released_on']; ?></li>
      </ul>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-8 col-md-8 col-xs-8 col-lg-8">
          </div>
          <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
            <form action="" method="post" name="login">
      <a href="booking.php?movie_id=<?php echo $row['mov_id']; ?>" class="btn btn-warning">Book Now</a>
    </form>
    </div>
    </div>
    </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
</div>
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
</div>
</div>
<?php } ?>

<div class="container">
  <div class="modal" id="mymodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-primary">Cancel Booking</h3>
          <button type="button" class="close" data-dismiss="modal">&times</button>
        </div>
       <div class="modal-body">
          <form action="" method="post" name="login" class="needs-validation" novalidate>

        <div class="input-group mb-5">
        <label for="validationCustomUsername">Enter Booking ID:</label>
        <div class="input-group">
        <div class="input-group-prepend">
       </div>
      <input type="number" class="form-control" id="validationCustomUsername" placeholder="Booking ID" name="b_id" aria-describedby="inputGroupPrepend" required>
    </div>
    </div>

    <div class="modal-footer  justify-content-center">
    <button  type="submit" class="btn btn-danger" name="delete">Cancel Booking</button>
    </div>
       </form>
   </div>
 </div>
</div>
</div>
</div>
<div class="container">
  <div class="modal" id="examplemodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-primary">See Your Ticket</h3>
          <button type="button" class="close" data-dismiss="modal">&times</button>
        </div>
       <div class="modal-body">
          <form action="" method="post" name="login" class="needs-validation" novalidate>

        <div class="input-group mb-5">
        <label for="validationCustomUsername">Enter Booking ID:</label>
        <div class="input-group">
        <div class="input-group-prepend">
       </div>
      <input type="number" class="form-control" id="validationCustomUsername" placeholder="Booking ID" name="b_id1" aria-describedby="inputGroupPrepend" required>
    </div>
    </div>

    <div class="modal-footer  justify-content-center">
    <button type="submit" class="btn btn-info" name="view">View Ticket</button>
    </div>
       </form>
   </div>
 </div>
</div>
</div>
</div>

<!-- Footer -->
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
