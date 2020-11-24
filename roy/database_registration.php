<?php
//session_start();
include('connection.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone_no=$_POST['phone_no'];
    $address=$_POST['address'];
    $dob=$_POST['dob'];

    $check=mysqli_num_rows(mysqli_query($conn,"select * from user_register where email='$email'"));
    if($check>0){
       
        echo '<script type="text/javascript">
                  alert("Email already exist!");
                window.location="Login.php";
          </script>';
    } 
   else {
        $done=mysqli_query($conn, "insert into user_register(name,email,phone_no,address,dob,password) values('$name','$email','$phone_no','$address','$dob','$password')");
        if($done){
            echo '<script type="text/javascript">
                  alert("Registration Done sucessfully! ");
                  window.location="Login.php";
          </script>';
        }
    }
}
?>