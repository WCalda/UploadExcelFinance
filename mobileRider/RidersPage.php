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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Rider</title>
</head>
<body style="background-color: #F5F5DC;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        $Name = $_GET['rider']
    </div>
</body>
</html>

