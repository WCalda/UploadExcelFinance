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
    <script src="App.js" type="module" defer></script>
    <title>Rider</title>
</head>
<body style="background-color: #FFF;">
    <header class="text-wrap fixed-top bg-primary text-light d-flex justify-content-center ">
        <h1 class="mt-2">
            <?php 
                session_start();
                $RiderName = $_SESSION['RidersName'];   
                echo $RiderName;
            ?>
        </h1>
    </header>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        
        <div class="table-responsive" style="width: 300px;">
            <table class="mx-auto">
                <form action="" method="GET">
                    <tr>
                        <td>
                            <label for="start_date" class="mt-5">From Date:</label>
                            <input type="date" class="form-control d-block mb-2" id="fromdate" name="fromdate" min="2022-01-01" max="2023-12-31" value="2022-01-01">
                        </td>
                        <td>
                            <label for="start_date" class="mt-5">To Date:</label>
                            <input type="date" class="form-control d-block mb-2" id="todate" name="todate" min="2022-01-01" max="2023-12-31" value="2022-01-01">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" class="mb-2 btn btn-primary">Generate</button>
                        </td>
                        <?php
                            
                        if(isset($_GET['fromdate']) && isset($_GET['todate'])){
                            $fromdate = $_GET['fromdate'];
                            $todate = $_GET['todate'];
                            $dsql = "SELECT * FROM datarider WHERE RiderName = '$RiderName' AND CreditDate BETWEEN '$fromdate' AND '$todate'";
                            $datequery = $conn->query($dsql);
            
                        ?>
                    </tr>
                </form>
            </table>
            <table class="table mx-auto">
                <tr class="text-center">
                    <th>Credit Date</th>
                    <th>Amount</th>
                </tr>
                <?php
                    if($datequery->num_rows > 0){
                        while($row = $datequery->fetch_assoc()){
                            echo
                                "<tr class=\"text-center\">
                                    <td>" . $row["CreditDate"]. " </td>
                                    <td>" . $row["AmountIssued"]. "</td>
                                </tr>";
                        }
                    } else{
                        echo "<td colspan=\"2\"> No Result Found </td>";
                    }
                } else {
                ?>
                <table class="table mx-auto">
                    <tr class="text-center">
                        <th>Credit Date</th>
                        <th>Amount</th>
                    </tr>
                <?php
                    $dsql = "SELECT * FROM datarider WHERE RiderName = '$RiderName'";
                    $result = $conn->query($dsql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo 
                            "<tr class=\"text-center\">
                                <td>" . $row["CreditDate"]. " </td>
                                <td>" . $row["AmountIssued"]. "</td>
                            </tr>";
                        }
                    } else if(!$result){
                        die("Query failed: " . mysqli_error($conn));
                    }
                }
                ?>
                <tr>
                    <td class="text-right fw-bold">Total Amount</td>
                    <td class="text-center">
                    <?php 

                        $nresult = $conn->query($dsql);
                        $ntotal = 0;
                        while($row = $nresult->fetch_assoc()) {
                            $ntotal += $row['AmountIssued'];
                        }

                        echo $ntotal;
                    ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>  
    <footer class="text-wrap mb-2 fixed-bottom d-flex justify-content-center">
            <button type="button" onclick="redirectToPage()" class="btn w-75 btn-primary">Logout</button>
            <script>
                function redirectToPage() {
                    window.location.replace('./ApplicationMobile.php');
                }
            </script>
        </footer> 
</body>
</html>

