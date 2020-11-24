<?php
include('connection.php');

if(isset($_POST['submit'])){
    $feedback_id=$_POST['id'];
    $name=$_POST['name'];
    $feedback=$_POST['feedback'];
     $user = mysqli_query($conn, "update feedback set name='$name',feedback='$feedback' feedback_id ");
     
      if($user){
            echo '<script type="text/javascript">
             alert("Feedback submitted succesfully!");
            window.location="home.php";
            </script>';
    }
   }
?>