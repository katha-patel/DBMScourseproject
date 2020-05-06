<?php
session_start();
$con=mysqli_connect('localhost','root','','movie');
if($_SESSION['which']==1)
{
  $b_id = $_SESSION['book_id'];
}
if($_SESSION['which']==0)
{
  $b_id = $_SESSION['b_id1'];
}
$query = "SELECT `time`, `date`, `movie_id`, `hall`, `seats`,`pay_mode` FROM `booking` WHERE `b_id`='$b_id'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($run);

$movie_id = $row['movie_id'];
$query1 = "SELECT `name`, `lang`, `img_url` FROM `mov` WHERE `mov_id`='$movie_id'";
$run1 = mysqli_query($con,$query1);
$row1=mysqli_fetch_assoc($run1);
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ticket</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <br>
  <br>
  <div class="row">
  <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
  </div>
  <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">

  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-3">
        <img src="<?php echo $row1['img_url']; ?>" class="card-img" alt="loading...">
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><b><?php echo $row1['name']; ?></b></h5>
          <p class="card-text"><?php echo $row1['lang']; ?><br><br><b><?php echo $row['date']."  ".$row['time'];?></b></p>
          <p class="card-text text-muted"><b><?php echo $row['hall']; ?></b></p>
        </div>
      </div>
    </div>
    <hr>
    <div class="row no-gutters">
          <div class="col-md-3">
            <div class="card-body">
              <center>
            <h2 class="card-title"><?php echo $row['seats'];?></h2>
            <p class="card-text text-muted">Tickets</p>
          </center>
          </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <div class="card-body">
            <p class="card-text text-muted">SCREEN3</p>
            <p class="card-text"><b>Gold</b></p>
          </div>
          </div>
          <div class="col-md-3">
            <img src="scancode.png" class="card-img" alt="loading...">
          </div>
          <div class="col-md-1"></div>
    </div>
    <hr>
    <br>
    <center>
      <p class="text-muted">BOOKING ID</p>
      <p><b><?php echo $b_id; ?></b></p>
    </center>

    <div class="card-footer">
      <table class="table table-borderless">

      <tbody>
        <tr>
          <td scope="row">Tickets(<?php echo $row['seats']; ?>)</td>
          <td>Rs <?php $er = $row['seats']; echo $er*150; echo ".00"; ?></td>
        </tr>
        <tr>
          <td scope="row">Convenience Fee</td>
          <td>Rs 57.00</td>
        </tr>
        <tr>
          <td scope="row">Discount</td>
          <td>Rs <?php echo $row['seats'].".00"; ?></td>
        </tr>
        <tr>
          <td scope="row">Additional Charges</td>
          <td>Rs 00.00</td>
        </tr>
      </tbody>
    </table>
      <hr>
    </div>

      <div class="card-body">
    <table class="table table-borderless">

    <tbody>
      <tr>
        <th scope="row">Total Amount</th>
        <td><b>Rs <?php echo $row['seats']*150+57+$row['seats']; echo ".00"; ?></b></td>
      </tr>
    </tbody>
  </table>
</div>
  </div>
<br>
<br>
</div>
<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
</div>
</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

  </body>
  </html>
