<?php

session_start();
if(!$_SESSION['name'])
{
header("location:login.php");
}

error_reporting(0);
include 'conn.php';

$id = $_GET['id'];
$name = ucfirst($_POST['name']);
$age = $_POST['age'];
$salary = $_POST['salary'];
$qualification = ucfirst($_POST['qualification']);
$dob = date("Y-m-d",strtotime($_POST['dob']));
$doj = date("Y-m-d",strtotime($_POST['doj']));
$date_of_birth = $dob;
$date_of_join = $doj;

$q="select * from employee where id = $id";
$query = mysqli_query($conn,$q);
$res=mysqli_fetch_array($query);

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
	background-image:linear-gradient(rgba(71,71,71,0.7),rgba(71,71,71,0.7)),url("img/a5.jpg");

  	
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
<div class="col-lg-6 m-auto">
	
	<form method="post">
		<br><div>
			<div class="card-header bg-dark">
				<h1 class="text-white text-center">Displaying Employee Details</h1>
			</div><br>

			<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
			<label>Name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $res['name']; ?>" required><br>

			<label>age</label>
			<input type="text" name="age" class="form-control" value="<?php echo $res['age']; ?>" required pattern="[0-9]{1,15}"
        title="this field accepts only numbers"><br>

			<label>salary</label>
			<input type="text" name="salary" class="form-control" value="<?php echo $res['salary']; ?>" required pattern="[0-9]{1,15}"
        title="this field accepts only numbers"><br>

			<label>qualification</label>
			<input type="text" name="qualification" class="form-control" value="<?php echo $res['qualification']; ?>" required><br>

            <label>date of Birth</label>
			<input type="text" name="dob" class="form-control"
			value="<?php echo $res['date_of_birth']; ?>" placeholder="date-month-year" required><br>

			<label>date of Joining</label>
			<input type="text" name="doj" class="form-control" value="<?php echo $res['date_of_join']; ?>" placeholder="date-month-year" required><br>

			<div class="row">
				<div class="col-md-3"><button class="btn btn-success" name="done">update</button></div>
         
			    <div class="col-md-3"><input type="button" class="btn btn-danger" name="delete" value="Delete" onclick="deleteme(<?php $_SESSION['id'] = $id; ?>)"></div>
			    <div class="col-md-3"><button class="btn btn-success" name="view">attendance</button></div>

	<script type="text/javascript">
		
function deleteme(delid)
{
      if(confirm("Are you sure you want to delete ?"))
      {
      	window.location.href="delete.php";
      }
}

	</script>
		    </div><br>
		    <a href="display.php"><input type="button" name="" value="Back to records" class="btn btn-primary col-lg-12"></a>
		</div>
	</form>
</div>
<?php


if(isset($_POST['done']))
{
$q2="update employee set name = '$name' , age = $age , salary = $salary , qualification = '$qualification' , date_of_birth = '$date_of_birth' , date_of_join = '$date_of_join' where id = $id";
mysqli_query($conn,$q2);
//header("location:display.php");
header("refresh:0");
}

if(isset($_POST['delete']))
{
	$_SESSION['id'] = $id;
	header("location:delete.php");
}

if (isset($_POST['view'])) {

$_SESSION['id'] = $id;
	header("location:attendance1.php");

}
?>
</body>
</html>