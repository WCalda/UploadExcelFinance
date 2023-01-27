<?php 

	require 'src/configuration.php'; 
	
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
    <title>Express Speed</title>
</head>
<body>
    <div class="card-header">
	    <div class="d-flex">
	        <div class="flex-grow-1 mt-2"><h4>Express Speed</h4></div>
	        <div> <img src="/src/XSpeedLogo.png" style="width: 50px; height: 50px" alt="Yea"></div>
	    </div>
	</div>
	<div class="container d-flex align-items-center" style="height: 90vh">
	    
	    <div class="container ">
			<div class="row">
				<div class="col-md-12 mt-4">
					<div class="card">
						<div class="card-header">
							<h4>Upload Partner's Data</h4>
						</div>
						<div class="card-body">

							<form action="" method="POST" class="form-inline" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input type="file" name="excel" class="form-control" value="" required/>
    								<button type="submit" name="import" class="btn btn-primary">Import</button>
                                </div>
								
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	  
	<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
			$fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
			    $keyid = $row[0];
				$ptname = $row[1];
				$issuedate = $row[2];
				$amount = $row[3];
				$nxamount = $row[4];
				$gcamount = $row[5];
				
				mysqli_query($conn, "INSERT INTO datarider VALUES('$keyid', '$ptname', '$issuedate', '$amount', '$nxamount', '$gcamount')");
				
			}
           	echo
			"
			<script>
				alert('Succesfully Imported');
				document.location.href = '';
			</script>
			";
		}
	?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
