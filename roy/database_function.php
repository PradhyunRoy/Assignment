<?php


function get_name( $conn,$emailid){
    $output = '';
    $sql = "select name from user_register where email='$emailid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $output=$row["name"];
    }
    return $output;
}

?>
