<?php
include_once ('connection.php');
include_once ('validation.php');

$id = $_GET['id'];

$select_query = "SELECT * FROM students WHERE id = $id";
$select_result = mysqli_query($connection, $select_query);
$row = $select_result->fetch_assoc();
$name = $row["name"];
$email = $row["email"];
$phone = $row["phone"];
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
				$update_query = "UPDATE students SET name = '$name', email = '$email', phone = $phone WHERE id = $id";

				$update_result = mysqli_query($connection, $update_query);

				if ($update_result != false) {
					echo $success_alert;
				} else {
					echo $fault_alert;
				}
			} else {
				$update_query = "UPDATE students SET name = '$name', email = '$email' WHERE id = $id";

				$update_result = mysqli_query($connection, $update_query);

				if ($update_result != false) {
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
						<input type="text" name="student_name" class="form-control" value="<?php echo $name; ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="student_email" class="form-control" value="<?php echo $email; ?>">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="student_phone" class="form-control" value="<?php echo $phone; ?>">
					</div>
					<button class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>