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
    <script src="App.js" type="module" defer ></script>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Rider</title>
</head>
<body style="background-color: #FFF;">
    <div id="maincontainer">
        <div>
            <div class="container-fluid text-center bg-primary text-light">
                <div class="row">
                    <div class="col mt-2">
                    <h1>
                        <?php 
                            $RiderName = $_SESSION['RidersName'];   
                            echo $RiderName;
                        ?>
                    </h1>
                    </div>
                </div>
            </div>
        
            <img src="../src/XSpeedLogo.png" class="img-fluid rounded mx-auto d-block" style="width: 120px; height: 120px" alt="X Speed Logo">
        
            <div class="container d-flex justify-content-center mb-2">
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
                                $dsql = "SELECT * FROM datarider WHERE RiderName = '$RiderName' AND CreditDate BETWEEN '$fromdate' AND '$todate' ORDER BY CreditDate DESC";
                                $datequery = $conn->query($dsql);
                        ?> 
                    </div>
                </form>
            </div>
            
            <div class="container mb-1">
                <div class="row row-col-2">
                    <div class="col mt-2 text-center fw-bold">
                        Credit Date
                    </div>
                    <div class="col mt-2 text-center fw-bold">
                        Amount
                    </div>
                </div>
            </div>
        
            <div id="conscrol">
            
                <div class="container justify-content-center">
                    <div class="container clckbl">
                            <?php
                                
                                if($datequery->num_rows > 0){
                                    while($row = $datequery->fetch_assoc()){
                                        $TotalVal = 0;
                                        echo
                                        "<div class=\"row row-col-2 table-group-divider\">
                                            <span class=\"g-col\" hidden>".$row["AmountIssued"]."</span>
                                            <span class=\"i-col\" hidden>". $row["Incentives"] ."</span>   
                                            <span class=\"h-col\" hidden>". $row["NumberOfGC"] ."</span>
                                            <div class=\"col text-center py-1 f-col\">" . $row["CreditDate"]. " </div>
                                            <div class=\"col text-center py-1 s-col\">"
                                            
                                            . $TotalVal = $row["AmountIssued"] + $row["Incentives"]. 
                                        
                                        
                                            "</div>
            
                                            
                                        </div>
                                        ";
                                    }
                                } else{
                                    echo "<td class=\"col\" colspan=\"2\"> No Result Found </td>";
                                }
                                } else {
                            ?>
                    </div>
                </div>
                
            </div>
      
                <div class="container mb-1">
                    <div class="row row-col-2">
                        <div class="col mt-2 text-center fw-bold">
                            Credit Date
                        </div>
                        <div class="col mt-2 text-center fw-bold">
                            Amount
                        </div>
                        <?php
                            $dsql = "SELECT * FROM datarider WHERE RiderName = '$RiderName' ORDER BY CreditDate DESC";
                            $result = $conn->query($dsql);
                            if ($result->num_rows > 0) {
                        ?>
                    </div>
                </div>
            
            
            <div id="conscrol">
                
                <div class="container justify-content-center">
                    <div class="container clckbl">
                        <?php
                            while($row = $result->fetch_assoc()) {
                                $TotalVal = 0;
                                echo 
                                "<div class=\"row row-col-2 table-group-divider\">
                                    <span class=\"i-col\" hidden>". $row["Incentives"] ."</span>
                                    <span class=\"g-col\" hidden>". $row["AmountIssued"] ."</span>
                                    <span class=\"h-col\" hidden>". $row["NumberOfGC"] ."</span>
                                    <div class=\"col text-center py-1 f-col\">" . $row["CreditDate"]. " </div>
                                    <div class=\"col text-center py-1 s-col\">"
                                    
                                    . $TotalVal = $row["AmountIssued"] + $row["Incentives"] . 
                                
                                
                                    "</div>
                                </div>
                                ";
                                }
                            } else if(!$result){
                                die("Query failed: " . mysqli_error($conn));
                            }
                        }
                        ?>
                    </div>
                </div>
                
            </div>
            
            <div class="container justify-content-center mb-1">
                <div class="container">
                    <div class="row">
                        <div class="col mt-2 fw-bold">
                            Total Amount
                        </div>
                        <div class="col mt-2 text-center">
                            <?php 
        
                                $nresult = $conn->query($dsql);
                                $ntotal = 0;
                                while($row = $nresult->fetch_assoc()) {
                                    $ntotal += $row['AmountIssued']+$row['Incentives'];
                                }
        
                                echo $ntotal;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <footer class="text-wrap mb-4 d-flex justify-content-center">
                    <button type="button" onclick="redirectToPage()" class="btn w-75 btn-primary">Logout</button>
                    <script>
                        function redirectToPage() {
                            window.location.replace('./ApplicationMobile.php');
                        }
                    </script>
                </footer> 
            </div>
        
        </div>
            
        </div>
        
        
        
    
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="exampleModalLabel">
                    
                        <span id="creditdate" class="text-center"></span>
                    
                    </h5>
                </div>
                <div class="modal-body">
                    <p>No. of GC: <span id="totalgc"></span></p>
                    <p>Commision Amount: ₱ <span id="commission"></span>.00</p>
                    <p>Incentives: ₱ <span id="incentives"></span>.00</p>
                    <p>Total Amount: ₱ <span id="totalamount"></span>.00</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" id="exitmodal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
       
</body>
</html>