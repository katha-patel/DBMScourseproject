<?php
session_start();
$con=mysqli_connect('localhost','root','','movie');
$person_id = $_SESSION['person_id'];
$query = "SELECT `name`, `email` FROM `customers` WHERE `id`='$person_id'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($run);

$b_id = $_SESSION['book_id'];
$query1 = "SELECT `seats`,`email`,`time`,`date`,`hall` FROM `booking` WHERE `b_id`='$b_id'";
$run1=mysqli_query($con,$query1);
$row1=mysqli_fetch_assoc($run1);
$seats = $row1['seats'];
$amount = $seats*150+$seats+57;
if(isset($_POST['confirm']))
{
  $pay_mode = $_POST['pay'];
  $query2 = "UPDATE `booking` SET `pay_mode`='$pay_mode' WHERE `b_id`='$b_id'";
  $run2=mysqli_query($con,$query2);
  echo $pay_mode;
  header('location:ticket.php');
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
      <h5><b>Title</b></h5>
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
<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
</div>
<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
  <table class="table table-borderless">

  <tbody>
    <tr>
      <th scope="row">Name : </th>
      <td><b><?php echo $row['name']; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Email : </th>
      <td><b><?php echo $row1['email']; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Movie : </th>
      <td><b><?php echo $_SESSION['mov_name']; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Date : </th>
      <td><b><?php echo $row1['date']; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Time : </th>
      <td><b><?php echo $row1['time']; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Theater : </th>
      <td><b><?php echo $row1['hall']; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Number Of Seats : </th>
      <td><b><?php echo $row1['seats']; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Total Amount : </th>
      <td><b><?php echo "Rs".$amount;?></b></td>
    </tr>
  </tbody>
</table>
<br>
<br>
<br>
<form action="#" method="post" name="login" id="submit">
  <select class="custom-select custom-select-lg mb-3" name="pay">
  <option selected>Select Payment Options:</option>
  <option value="google pay" >Google Pay</option>
  <option value="phone pay" >Phone Pe</option>
  </select>
  <br>
  <br>
  <center>
  <div class="form-group">
    <button class="btn btn-warning btn-lg" type="submit" name="confirm">Confirm Payment</button>
  </div>
  </center>
</form>
</div>
<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
</div>
</div>


<br>
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
