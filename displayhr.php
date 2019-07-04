<?php
include 'conn.php';
session_start();

echo $_SESSION['name'];
if(!$_SESSION['name'])
{
header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>


<style>
body{
	background-image:linear-gradient(rgba(71,71,71,0.9),rgba(71,71,71,0.9)),url("img/a1.jpg");

  	
	background-size: cover;
  	background-position: center;
  	
	height: 100vh;
}


</style>

</head>
<body>
<br>
<div>
<h2 class="text-white"><center><font size="10">Employee Management System</font></center></h2>

</div><br>

<div class="container">
	<div class="col-lg-12"><br>
		<div class="row">
		<h3 class="text-white">Displaying Records</h3>
		<a href="logout.php" class="col-lg-3"><button class="btn btn-success col-lg-4" name="logout">logout</button></a>
        </div>
		<table class="table table-stripped table-hover table-bordered">
			<tr class="text-white">
				<th><h5>ID</h5></th>
				<th><h5>Name</h5></th>
				<th><h5>Age</h5></th>
				<th><h5>Salary</h5></th>
				<th><h5>Qualification</h5></th>
				<th><h5>Date of Birth</h5></th>
				<th><h5>Date of Join</h5></th>
			</tr>


			<?php
include 'conn.php';

$q="select * from employee";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>

			<tr class="text-white">
				<th><?php echo $res['id'] ?></th>
				<th><?php echo $res['name'] ?></th>
				<th><?php echo $res['age'] ?></th>
				<th><?php echo $res['salary'] ?></th>
				<th><?php echo $res['qualification'] ?></th>
				<th><?php echo $res['date_of_birth'] ?></th>
				<th><?php echo $res['date_of_join'] ?></th>
				<th><a  href="viewhr.php?id=<?php echo $res['id']; ?>" class="text-white"><button class="btn btn-success">View</button></a></th>
			</tr>
<?php }
?>

		</table>
	</div>
</div>
</body>
</html>
