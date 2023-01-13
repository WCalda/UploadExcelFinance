<?php

    require 'configuration.php';

    // Check Connection
    /*
    if(mysqli_connect_errno()){
        echo "Connection Error";
    } else {
        echo "Good Connection";
    }
    */
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
                    <div class="text-center m-1">
                        <input class="text-center rounded" type="text" placeholder="Rider Code">
                    </div>
                    <div class="text-center m-1">
                        <input class="text-center rounded" type="text" placeholder="Password">
                    </div>

                    <div class="card-body text-center">
                        <button type="button" class="btn bg-light border-dark text-center">Sign In</button>
                    </div>      
                </div>
            </div>
        </div>
    </div>


</body>
</html>