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
    <script src="App."></script>
    <title>Rider</title>
</head>
<body style="background-color: #FFF;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <?php 
            session_start();
            $RiderName = $_SESSION['RidersName'];
            $sql = "SELECT * FROM datarider WHERE RiderName = '$RiderName'";
            $result = $conn->query($sql);
            
        ?>
        <header style="background-image: var(--bs-gradient);" class="text-wrap fixed-top bg-primary text-light d-flex justify-content-center ">
            <h1 class="mt-2">
                <?php 
                    
                    echo $RiderName;

                ?>
            </h1>
        </header>

        <div class="table-responsive">
            <table class="mx-auto">
                <tr>
                    <form>
                        <td>
                            <label for="start_date" class="mt-5">From Date:</label>
                            <input type="date" class="form-control d-block mb-3" id="fromdate" name="start_date" min="2023-01-01" max="2023-12-31" value="2023-01-01">
                        </td>
                        <td>
                            <label for="start_date" class="mt-5">To Date:</label>
                            <input type="date" class="form-control d-block mb-3" id="todate" name="start_date" min="2023-01-01" max="2023-12-31" value="2023-01-01">
                        </td>
                    </form>
                </tr>
            </table>
        </div>
        

        <div class="table-responsive" style="width: 300px;">
            <table class="table mx-auto">
                <tr class="text-center">
                    <th class="table-dark">Credit Date</th>
                    <th class="table-dark">Amount</th>
                </tr>
                <?php 
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo 
                            "<tr class=\"text-center\">
                                <td>" . $row["CreditDate"]. " </td>
                                <td>" . $row["AmountIssued"]. "</td>
                            </tr>";
                        }
                    } else {
                        if(!$result){
                            die("Query failed: " . mysqli_error($conn));
                        }
                        echo "0 results";
                    }
                ?>
                <tr >
                    <td class="text-right table-info fw-bold">Sum</td>
                    <td class="text-center table-info">
                    <?php 
                        $nresult = $conn->query($sql);
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
        <footer class="text-wrap mb-2 fixed-bottom d-flex justify-content-center">
            <button type="button" onclick="redirectToPage()" class="btn btn-dark">Logout</button>
            <script>
                function redirectToPage() {
                    window.location.replace('./ApplicationMobile.php');
                }
            </script>
        </footer> 
    </div>  
</body>
</html>

