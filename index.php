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
    <title>RMI Project</title>
</head>
<body>
	<div class="bg-image" style="background-image: url('src/rmi-bg.png'); height: 100vh; background-repeat: no-repeat; background-position: center;">
		<div class="card-header">
			<h4>RMI Project</h4>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-4">
					<div class="card">
						<div class="card-header">
							<h4>Upload Riders Data</h4>
						</div>
						<div class="card-body">

							<form action="" method="POST" enctype="multipart/form-data">

								<input type="file" name="excel" class="form-control" value="" required/>
								<button type="submit" name="import" class="btn btn-primary mt-3">Import</button>

							</form>

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
					$ptname = $row[0];
					$issuedate = $row[1];
					$amount = $row[2];
					
					mysqli_query($conn, "INSERT INTO partners VALUES('', '$ptname', '$issuedate', '$amount')");
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
	</div>
</body>
</html>
