<?php
session_start();
include 'conn.php';
if(!$_SESSION['name'])
{
header("location:login.php");
}

$id = $_SESSION['id'];

$q="select * from time where id=$id";

$query = mysqli_query($conn,$q);
$res = mysqli_fetch_array($query);
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
	background-image:linear-gradient(rgba(71,71,71,0.9),rgba(71,71,71,0.9)),url("img/a7.jpg");

  	
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
		<h3 class="text-white">Attendance of <?php echo $res['name']; ?></h3>
		<a href="update.php?id=<?php echo $id; ?>" class="col-lg-3"><button class="btn btn-success col-lg-4" name="logout">back</button></a>
		<a href="logout.php" class="col-lg-3"><button class="btn btn-success col-lg-4" name="logout">logout</button></a>

        </div>
		<table class="table table-stripped table-hover table-bordered">
			<tr class="text-white">
				
				
				<th><h5>day</h5></th>
				<th><h5>date</h5></th>
				<th><h5>time in</h5></th>
				<th><h5>time out</h5></th>
				
			</tr>

			
			<?php
include 'conn.php';
	

$q="select * from time where id=$id";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>

			<tr class="text-white">
				
				<th><?php echo $res['day'] ?></th>
				<th><?php echo $res['date'] ?></th>
				<th><?php echo $res['time_in'] ?></th>
				<th><?php echo $res['time_out'] ?></th>
			</tr>
<?php }
?>

		</table>
	</div>
</div>

</body>
</html>