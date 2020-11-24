<?php
include("connection.php");
require_once('database_function.php');
session_start();
$user_email=$_SESSION['email'];
$feedback_id=$_REQUEST['id'];
$sql = "select * from feedback where feedback_id='$feedback_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);


?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
  </head>
  <body>
  <div class="container-fluid">

  
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand ml-5"><?php echo get_name( $conn,$user_email); ?></a>
            <form class="d-flex">
               <a href="logout.php"class="btn btn-outline-success" type="submit">Logout</a>
            </form>
        </div>
    </nav>

    <div class="row mt-5">
        <div class="col-sm-3"></div>
            <div class="col-sm-6 bg-white shadow-lg">
            <form action="database_edit.php" method="post">
                <h4 class="text-center mt-3" >Update Form</h4>
                <input type="text" name="name" id="" class="form-control mt-2" value="<?php echo "".$row['name']."" ; ?>" placeholder="Name" required>
                <input type="text" name="feedback" id="" class="form-control mt-2" value="<?php echo "".$row['feedback']."" ; ?>" placeholder="Feedback" required>
                <a href='database_edit.php?id='.$row["feedback_id"].'' name="submit" class="btn btn-success mt-2 mb-3">Update</a>
            </form>
            </div>
        </div>



</div>
</div>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

  </body>
</html>