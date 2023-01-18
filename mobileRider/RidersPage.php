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
<body style="background-color: #F5F5DC;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
    <?php 

        $sql = "SELECT * FROM partners";
        $result = $conn->query($sql);

    ?>
        <div class="table-responsive">
            <div class="table-responsive">
                <h3 class="text-center">William Calda</h3>
            </div>
            <table class="table mx-auto">
                <tr>
                    <form>
                        <td>
                            <label for="start_date">From Date:</label>
                                <input type="date" class="form-control d-block mb-3" id="fromdate" name="start_date" min="2023-01-01" max="2023-12-31" value="2023-01-01">
                        </td>
                        <td>
                        <label for="start_date">To Date:</label>
                            <input type="date" class="form-control d-block mb-3" id="todate" name="start_date" min="2023-01-01" max="2023-12-31" value="2023-01-01">
                        </td>
                    </form>
                </tr> 
            </table>
            <table class="table mx-auto">
                <tr class="text-center">
                    <th>Credit Date</th>
                    <th>Amount</th>
                </tr>
                <?php 
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo 
                            "<tr class=\"text-center\">
                                <td>" . $row["DateIssued"]. " </td>
                                <td>" . $row["Amount"]. "</td>
                            </tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            </table>
            <div>
                <table class="table mx-auto">
                    <tr>
                        <td class="text-right fw-bold">Sum</td>
                        <td class="text-center">0</td>
                    </tr>
                </table>
            </div>
            <table class="table mx-auto">
                <tr>
                    <td class="text-center"><button type="button" onclick="redirectToPage()" class="btn btn-dark">Logout</button></td>
                </tr>
                <script>
                    function redirectToPage() {
                        window.location.replace('./ApplicationMobile.php');
                    }
                </script>
            </table>
        </div>
    </div>
</body>
</html>
