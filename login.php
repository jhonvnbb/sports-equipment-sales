<?php
// $conn = mysqli_connect("localhost", "root", "", "sports_equipment_sales");

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
require './config/dbconnect.php';

session_start();
$errors = [];

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $cek_admin = mysqli_num_rows($sql_admin);

    if ($cek_admin > 0) {
        $_SESSION['username'] = $username;
        header('Location: ./?username=' . urlencode($_SESSION['username']));
        exit();
    } else {
        $errors['username'] = "Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('./assets/images/background2.jpeg') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            border-radius: 20px;
            max-width: 500px;
            width: 100%;
            background: rgba(255, 255, 255, 0.85); /* Mengubah alpha menjadi 0.7 */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }


        .avatar img {
            width: 100px;
            height: 100px;
        }

        .card-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 24px
        }

        .form-control:focus {
            border-color: #2ecc71;
            box-shadow: none;
        }

        .btn-success {
            background-color: #2ecc71;
            border-color: #2ecc71;
            padding: 10px 15px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .btn-success:hover {
            background-color: #27ae60;
        }

        .text-primary:hover {
            color: #2980b9 !important;
        }

        .card-footer {
            background: none;
            border-top: none;
        }

        .card-footer a {
            text-decoration: none;
            color: #2ecc71;
        }

        .card-footer a:hover {
            color: #27ae60;
        }

        ::placeholder {
            color: #bdc3c7;
            opacity: 1;
        }

        .input-group {
            position: relative;
        }

        .input-group input {
            padding-left: 40px;
        }

        .input-group .input-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #bdc3c7;
        }

        @media (max-width: 576px) {
            .card {
                width: 90%;
            }
        }

        .input-group input[type="text"],
        .input-group input[type="password"] {
            padding-left: 40px;
            font-size: 14px; 
            opacity: 0.7; 
        }

        .input-group .input-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px; 
            color: #bdc3c7;
            opacity: 0.7; 
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4">
            <div class="card-body text-center">
                <div class="avatar mb-4">
                    <img src="./assets/images/spents-logo.png" alt="User Avatar" class="rounded-circle shadow">
                </div>
                <h2 class="card-title mb-4">Login to Your Account</h2>
                <form action="login.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <?php if(isset($errors['username'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo $errors['username']; ?>'
            });
        </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>