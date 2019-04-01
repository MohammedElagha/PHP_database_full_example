<?php
include_once ('connection.php');
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
	if (isset($_POST['student_id'])) {
		$delete_query = "DELETE FROM students WHERE id = " . $_POST['student_id'];
		$delete_result = mysqli_query($connection, $delete_query);

		if ($delete_result != false) {
			echo $success_alert;
		} else {
			echo $fault_alert;
		}
	}
}
?>

			<div class="col-12">
				<table class="table table-bordered">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>
					<tbody>
<?php
$query = "SELECT * FROM students";
$result = mysqli_query($connection, $query);

if ($result != false) {
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$id = $row["id"];
			echo '<tr>
				<td>'.$row["name"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["phone"].'</td>
				<td><a href="http://localhost/php_mobile_course/db/edit.php?id='.$id.'">Edit</a></td>
				<td>
					<form action="" method="POST">
						<input type="hidden" value="'.$id.'" name="student_id">
						<button type="submit">Delete</button>
					</form>
				</td>
			</tr>';
		}
	}
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

