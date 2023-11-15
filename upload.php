<?php 


$file_error= "";
$success= "";


if(isset($_POST['upload'])){

	/*echo "<pre>";
	print_r($_FILES);
	echo "</pre>";*/
	

	$file_name = $_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$file_tmp_name = $_FILES['image']['tmp_name'];
	$file_error = $_FILES['image']['error'];
	$file_size = $_FILES['image']['size'];

	if($file_error > 0){
		$file_error = "<span class='text-danger'>Please select an image first</span>";
	}
	elseif ($file_size > 1048579) {
		$file_error = "<span class='text-warning'>File size must be less than 1 mb</span>";
	}
	else{
		move_uploaded_file($file_tmp_name, "uploads/$file_name");
		$success= "<span class='text-success'>Image successfully uploaded</span>";
	}


}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP File Upload</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header bg-success">
					<h4 class="card-title">PHP File Upload</h4>
				</div>
				<div class="card-body">
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
						<div class="mb-3">
							<input type="file" name="image" class="form-control">
							<?php 

								echo $file_error;
								echo $success;

							 ?>
						</div>

						<div class="mb-3 d-grid">
							<input type="submit" name="upload" class="btn btn-outline-success" value="Upload">
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>