<?php
include("connection.php");
require_once('database_function.php');
session_start();
$user_email=$_SESSION['email'];

    $sql = "select * from feedback";
    $result = mysqli_query($conn, $sql);
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
            <form action="database_homepage.php" method="post">
                <h4 class="text-center mt-3" >Fill the Form</h4>
                <input type="text" name="name" id="" class="form-control mt-2" placeholder="Name" required>
                <input type="text" name="feedback" id="" class="form-control mt-2" placeholder="Feedback" required>
                <input type="submit" name="submit" id="" value='Submit' class="btn btn-success mt-2 mb-3">
            </form>
            </div>
        </div>

    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 shadow-lg">
            <h4 class="text-center mt-3">SHOW INFORMATION</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Sn.</th>

                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Feedback</th> 
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <tbody>

                <?php
                    
                    while($row = mysqli_fetch_array($result))
                        {
                            echo '<tr>
                    


                            <th scope="row">'.$row['feedback_id'].'</th>
                             
                            <td>'.$row['name'].'</td>
                            <td>'.$user_email.'</td>
                            <td>'.$row['feedback'].'</td>
                            <td>
                             <a href="delete.php?id='.$row['feedback_id'].'" class="btn btn-danger" >Delete</a>
                             <a href="home.php?id='.$row['feedback_id'].'" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</a>
                            </td>
                        </tr>
                        ';
                              }
    
                    ?>

                </tbody>
            </table>


</div>
</div>
</div>


<?php
if(isset($_REQUEST['id'])){
    $feedback_id=$_REQUEST['id'];
    $sql = "select * from feedback where feedback_id='$feedback_id'";
    $result = mysqli_query($conn, $sql);
    $row1=mysqli_fetch_array($result);


}
?>






<!--Register Model-->
<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="register text-center">Edit  </h5>

        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" name="name" id="" class="form-control mt-2" value="<?php echo "".$row1['name']."" ; ?>" placeholder="Name" required>
        <input type="text" name="feedback" id="" class="form-control mt-2" value="<?php echo "".$row1['feedback']."" ; ?>" placeholder="Feedback" required>
 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="submit" name="submit" class="btn btn-primary">
        
      </div>
    </div>
    </form>
  </div>
</div>
<!--End-Model-->


    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

  </body>
</html>