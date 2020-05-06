<?php
session_start();
$con=mysqli_connect('localhost','root','','movie');
if(isset($_POST['confirm']))
{
  $name = $_POST['name'];
  $description = $_POST['description'];
  $rating = $_POST['rating'];
  $genre = $_POST['genre'];
  $released_on = $_POST['released_on'];
  $lang = $_POST['lang'];
  $duration = $_POST['duration'];
  $img_url = $_POST['img_url'];
  $query = "INSERT INTO `mov`(`name`, `description`, `rating`, `genre`, `lang`, `released_on`, `duration`, `img_url`) VALUES ('$name','$description','$rating','$genre','$lang','$released_on','$duration','$img_url')";
  $run=mysqli_query($con,$query);
  if($run)
  {
    $query1 = "SELECT `mov_id` FROM `mov` WHERE `name`='$name'";
    $run1=mysqli_query($con,$query1);
    $row1 = mysqli_fetch_assoc($run1);
    $mov_id = $row1['mov_id'];
    echo '<script>alert("New Movie Successfully Inserted. With Movie_ID='.$mov_id.'")</script>';
  }
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
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
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#" data-target="#mymodel" data-toggle="modal">Delete Movie</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<br>
<br>

<div class="container-fluid">
<div class="row">
<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
</div>
<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
  <?php

  if(isset($_POST['delete']))
  {
    $movie_id = $_POST['movie_id'];
    $query3 = "SELECT * FROM `mov` WHERE `mov_id`='$movie_id'";
    $run3=mysqli_query($con,$query3);
    $row3=mysqli_num_rows($run3);
    if($row3)
    {
    $query2 = "DELETE FROM `mov` WHERE `mov_id`='$movie_id'";
    $run2=mysqli_query($con,$query2);
    if($run2)
    {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Movie Deleted</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    else {
      echo '<script>alert("No Such Movie Id")</script>';
    }
  }
}

   ?>
  <h3>Insert New Movie:</h3>
  <br>
  <br>
<form action="#" method="post" name="login" id="submit">
  <div class="form-group">
  <label for="name">Name Of The Movie:</label>
  <input type="text"   name="name"  placeholder="Name" class="form-control" >
    </div>
    <div class="form-group">
    <label for="description">Description:</label>
    <input type="text"   name="description"  placeholder="Description" class="form-control" >
      </div>
      <div class="form-group">
      <label for="rating">Rating:</label>
      <input type="text"  style="width:500px;" name="rating"  placeholder="Rating" class="form-control" >
        </div>
     <div class="row">
       <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
         <div class="form-group">
         <label for="genre">Genre:</label>
         <input type="text"   name="genre"  placeholder="Genre" class="form-control" >
           </div>
           <div class="form-group">
           <label for="released_on">Released On:</label>
           <input type="date"   name="released_on"  placeholder="Released On" class="form-control" >
             </div>
       </div>
       <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
         <div class="form-group">
         <label for="lang">Language:</label>
         <input type="text"   name="lang"  placeholder="Language" class="form-control" >
           </div>
           <div class="form-group">
           <label for="duration">Duration:</label>
           <input type="time"   name="duration"  placeholder="Duration" class="form-control" >
             </div>
       </div>
     </div>
     <div class="form-group">
     <label for="img_url">Image URL:</label>
     <input type="text" name="img_url" placeholder="Image URL" class="form-control" >
       </div>
       <br>
       <center>
       <div class="form-group">
         <button class="btn btn-warning btn-lg" type="submit" name="confirm">Insert Movie</button>
       </div>
       </center>
</form>
</div>
<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3"></div>
</div>
</div>

<div class="container">
  <div class="modal" id="mymodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-primary">Delete Movie</h3>
          <button type="button" class="close" data-dismiss="modal">&times</button>
        </div>
       <div class="modal-body">
          <form action="" method="post" name="login" class="needs-validation" novalidate>

        <div class="input-group mb-5">
        <label for="validationCustomUsername">Enter Movie ID:</label>
        <div class="input-group">
        <div class="input-group-prepend">
       </div>
      <input type="number" class="form-control" id="validationCustomUsername" placeholder="Movie ID" name="movie_id" aria-describedby="inputGroupPrepend" required>
    </div>
    </div>

    <div class="modal-footer  justify-content-center">
    <button  type="submit" class="btn btn-danger" name="delete">Delete Movie</button>
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
