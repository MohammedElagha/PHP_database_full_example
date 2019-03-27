<?php
include_once ('connection.php');
include_once ('validation.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
<?php
$success_alert = '<div class="col-12">
	<div class="alert alert-success">SUCCESS</div>
</div>';

$fault_alert = '<div class="col-12">
	<div class="alert alert-danger">FAILED</div>
</div>';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['student_name']) && isset($_POST['student_email']) && isset($_POST['student_phone'])) {

		$name = $_POST['student_name'];
		$email = $_POST['student_email'];
		$phone = $_POST['student_phone'];

		if (!empty($name) && !empty($email)) {
			if (!empty($phone)) {
				$query = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', $phone)";

				$result = mysqli_query($connection, $query);

				if ($result != false) {
					echo $success_alert;
				} else {
					echo $fault_alert;
				}
			} else {
				$query = "INSERT INTO students (name, email) VALUES ('$name', '$email')";

				$result = mysqli_query($connection, $query);

				if ($result != false) {
					echo $success_alert;
				} else {
					echo $fault_alert;
				}
			}	
		} else {
			echo $fault_alert;
		}
	}
}
?>

			
			<div class="col-12">
				<form action="" method="POST">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="student_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="student_email" class="form-control">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="student_phone" class="form-control">
					</div>
					<button class="btn btn-primary">Add</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>