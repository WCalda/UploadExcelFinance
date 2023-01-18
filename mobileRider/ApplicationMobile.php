<?php

    require '../src/configuration.php';
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="App.js" type="module" defer></script>
    <title>Login</title>
</head>
<body style="background-color: #F5F5DC;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
            <form class="text-center" action="" method="POST">
            <img src="../src/XSpeedLogo.png" style="width: 200px; height: 200px" class="img-fluid rounded mx-auto d-block" alt="Yea">
                <p id="hidden-text" class="d-none text-white text-center bg-danger p-2">Invalid Username or Password</p>
                <div class="form-group">
                    <input type="text" class="form-control text-center mb-2" id="ridercode" name="ridercode" placeholder="Rider Code">
                </div>
                <div id="hidden">
                <div class="form-group">
                    <input type="password" class="form-control text-center mb-2" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
            <?php 
            if (isset($_POST['login'])) {
                $username = $_POST['ridercode'];
                $password = $_POST['password'];
        
                $query = "SELECT * FROM riders WHERE IDCode='$username' AND RPassword='$password'";
                $result = mysqli_query($conn, $query);
        
                if (mysqli_num_rows($result) == 1) {
                    header('Location: RidersPage.php'); 
                } else {
                    echo
                    "
                    <script>
                        hiddenerrorcode();
                    </script>
                    ";
                }
            }   
            ?>
    </div>
</body>
</html>