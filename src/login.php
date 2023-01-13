<?php

    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "financeproj";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="icon/x-image" href="src/rmi-icon.jpg">
    <title>Rider</title>
</head>
<body>
    <div class="card-header">
        <h4 class="text-center">Login</h4>
    </div>
    <div class="container">
        <div class="col-md-24 mt-4">
            <h4 class="text-center">EXSPEED Riders</h4>
        </div>
        <div class="col d-flex justify-content-center">
            <div class="card bg-dark mb-3 w-40">
                <div class="card-body text-center m-0">

                    <form action="login.php" method="POST">
                        <div class="text-center m-1">
                            <input class="text-center rounded" type="text" name="ridercode" placeholder="Rider Code">
                        </div>
                        <div class="text-center m-1">
                            <input class="text-center rounded" type="text" name="password" placeholder="Password">
                        </div>
                        
                        <div class="card-body text-center">
                            <button type="submit" name="login" class="btn bg-light border-dark text-center">Sign In</button>
                        </div>
                    </form>
                    
                    <?php
                    
                    if (isset($_POST['login'])) {
                        $username = $_POST['ridercode'];
                        $password = $_POST['password'];
                
                        $query = "SELECT * FROM partnercode WHERE IDCode='$username' AND password='$password'";
                        $result = mysqli_query($conn, $query);
                
                        if (mysqli_num_rows($result) == 1) {
                            $_SESSION['ridercode'] = $username;
                            header('location: main.php');
                            echo $username;
                            echo $password;
                            
                        } else {
                            echo "Incorrect username or password";
                        }

                    }
                    
                    ?>

                </div>
            </div>
        </div>
    </div>


</body>
</html>