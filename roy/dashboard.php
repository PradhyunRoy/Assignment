<?php
include('connection.php');
$users=mysqli_query($conn,"select * from user_register");

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
    <title>Dashboard</title>
  </head>
  <body>
    
  <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand ml-5">Admin</a>    
        </div>
    </nav>
    <div class="container">
        <div class="row shadow-lg">   
            <div class="col-1"></div>
            <div class="col-10">
            <h4 class="text-center mt-3 mb-2"><u>Users Details</u></h4>
            <table class="table table-hover">
                <thead>
                <tr>

                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th> 
                    <th scope="col">Phone No</th>
                    <th scope="col">Address</th>
                    <th scope="col">D-O-B</th>
                    <th scope="col">Password</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                    while($row = mysqli_fetch_array($users)) {
                        echo '<tr>
                    <th scope="row">'.$row['id'].'</th>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td> '.$row['phone_no'].'</td>
                    <td>'.$row['address'].' </td>
                    <td>'.$row['dob'].' </td>
                    <td>'.$row['password'].' </td>
                                    </tr>';

                    }
                ?>
                </tbody>
            </table>   
            </div>
        </div>
    </div>

    <!--  Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

   
  </body>
</html>