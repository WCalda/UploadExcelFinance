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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="styles.css">
    <script src="App.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Rider</title>
</head>
<body style="background-color: #FFF;">
    <div class="container-fluid text-center bg-primary text-light">
        <div class="row">
            <div class="col">
            <h1>
                <?php 
                    session_start();
                    $RiderName = $_SESSION['RidersName'];   
                    echo $RiderName;
                ?>
            </h1>
            
            </div>
        </div>
    </div>
    
    <img src="../src/XSpeedLogo.png" class="w-50 h-50 img-fluid rounded mx-auto d-block" alt="X Speed Logo">
    
    <div class="container d-flex justify-content-center">
        <form action="" method="GET">
            <div class="row g-1">
                <div class="col">
                    <label for="start_date">From Date:</label>
                    <input type="date" class="form-control" id="fromdate" name="fromdate" min="2022-01-01" max="2023-12-31" value="2022-01-01"> 
                </div>
                <div class="col">
                    <label for="start_date">To Date:</label>
                    <input type="date" class="form-control" id="todate" name="todate" min="2022-01-01" max="2023-12-31" value="2022-01-01">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary mt-4">&#10004;</button>
                </div>
                <?php               
                    if(isset($_GET['fromdate']) && isset($_GET['todate'])){
                        $fromdate = $_GET['fromdate'];
                        $todate = $_GET['todate'];
                        $dsql = "SELECT * FROM datarider WHERE RiderName = '$RiderName' AND CreditDate BETWEEN '$fromdate' AND '$todate'";
                        $datequery = $conn->query($dsql);
                ?> 
            </div>
        </form>
    </div> 


    <div class="container justify-content-center">
        <div class="row mb-2">
            <div class="col mt-2 text-center fw-bold">
                Credit Date
            </div>
            <div class="col mt-2 text-center fw-bold">
                Amount
            </div>
        </div>
            <?php
                if($datequery->num_rows > 0){
                    while($row = $datequery->fetch_assoc()){
                        echo
                        "<div class=\"row\">
                            <div class=\"col text-center f-col\">" . $row["CreditDate"]. " </div>
                            <div class=\"col text-center s-col\">" . $row["AmountIssued"]. "</div>
                        </div>
                        ";
                    }
                } else{
                    echo "<td class=\"col\" colspan=\"2\"> No Result Found </td>";
                }
                } else {
            ?>
    </div>      
    
    <div class="container justify-content-center">
        <div class="row mb-2">
            <div class="col mt-2 text-center fw-bold">
                Credit Date
            </div>
            <div class="col mt-2 text-center fw-bold">
                Amount
            </div>
        </div>
        <?php
            $dsql = "SELECT * FROM datarider WHERE RiderName = '$RiderName'";
            $result = $conn->query($dsql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo 
                    "<div class=\"row\">
                        <div class=\"col text-center f-col\">" . $row["CreditDate"]. " </div>
                        <div class=\"col text-center s-col\">" . $row["AmountIssued"]. "</div>
                    </div>
                    ";
                    }
                } else if(!$result){
                    die("Query failed: " . mysqli_error($conn));
                }
            }
        ?>
    </div>

    <div class="container justify-content-center">
        <div class="row mt-2">
            <div class="col mt-2 fw-bold">
                Total Amount
            </div>
            <div class="col mt-2 text-center">
                <?php 

                    $nresult = $conn->query($dsql);
                    $ntotal = 0;
                    while($row = $nresult->fetch_assoc()) {
                        $ntotal += $row['AmountIssued'];
                    }

                    echo $ntotal;
                ?>
            </div>
        </div>
    </div>
    
    <div class="container">
        <footer class="text-wrap mb-2 fixed-bottom d-flex justify-content-center">
            <button type="button" onclick="redirectToPage()" class="btn w-75 btn-primary">Logout</button>
            <script>
                function redirectToPage() {
                    window.location.replace('./ApplicationMobile.php');
                }
            </script>
        </footer> 
    </div>
       

    <script src="App.js"></script>
</body>
</html>

