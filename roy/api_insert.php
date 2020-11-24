<?php
header('Content-type:application/json');
header('Acess-Control-Allow-Origin:*');
header('Acess-Control-Allow-Methods:POST');
header('Acess-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data=json_decoder(file_get_contents("php://input"),true);

$feedback_id=$data['feedback_id'];
$email=$data['email'];
$name=$data['name'];
$feedback=$data['feedback'];

include('connection.php');
$sql = "insert into feedback(feedback_id,email,name,feedback) values('$feedback_id','$email','$name','$feedback')";

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message' => 'Employe Record Inserted.','status' =>true));

}else{
    echo json_encode(array('message' => 'Employe Record Not Inserted.','status' =>false));
}


?>