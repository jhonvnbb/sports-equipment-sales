<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM users where user_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"User Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>