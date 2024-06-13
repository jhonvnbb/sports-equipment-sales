<?php
// Correct path to dbconnect.php
include_once "../config/dbconnect.php";

// Check if session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = "";
$errors = array();

// Login Button
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $cek_admin = mysqli_num_rows($sql_admin);

    if ($cek_admin > 0) {
        $_SESSION['username'] = $username;
        header('Location: ./index.php/?username=' . urlencode($_SESSION['username']));
        exit();
    } else {
        $errors['username'] = "Incorrect username or password!";
    }
}
?>
