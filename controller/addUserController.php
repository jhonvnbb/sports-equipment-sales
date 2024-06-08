<?php
include_once "../config/dbconnect.php";

if(isset($_POST['add'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNo = $_POST['contact_no'];
    $registeredAt = $_POST['registered_at'];
    $userAddress = $_POST['user_address'];

    $insert = mysqli_query($conn, "INSERT INTO users (first_name, last_name, email, password, contact_no, registered_at, isAdmin, user_address) VALUES ('$firstName', '$lastName', '$email', '$password', '$contactNo', '$registeredAt', 0, '$userAddress')");

    if (!$insert) {
        echo "Error: " . mysqli_error($conn);
        header("Location: ../?addUser=error");
    } else {
        echo "Records added successfully.";
        header("Location: ../?addUser=success");
    }
    exit;
}
?>
