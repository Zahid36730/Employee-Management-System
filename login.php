<?php
error_reporting(0);
session_start();
include "conn.php";

$name = $_POST['name'];
$Password = $_POST['pass'];

    
	
if (isset($_POST['Login'])) 
{


	$q= "select * from login where name = '$name' and password = '$Password'";

	$res = mysqli_query($conn,$q);
	$res1 = mysqli_num_rows($res);
    
    if ($res1 == 0) 
    {
          header("location:login.php?user=Incorrect username or Password");		
	}	

    while ($row = mysqli_fetch_array($res)) {

    	if ($row['name'] == $name  &&  $row['password'] == $Password)
    	 {
    	 	$_SESSION['name'] = $name ;
    		$_SESSION['password'] = $Password ;

    		if ($row['type'] == 'admin') {
    			
    			header("location:display.php");
    			
    		}

    		elseif ($row['type'] == 'hr') 
    		{
    			header("location:displayhr.php");
            }

    	}

    	
    }



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
	background-image:linear-gradient(rgba(71,71,71,0.8),rgba(71,71,71,0.8)),url("img/a1.jpg");

  	
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
	
    <form method="post">
     <div class="form-group col-lg-6 m-auto">
      <div class="container">

		

        	<div class="card-header bg-dark">


      		<h3 class="text-white">Login</h3>
      	    </div><br>
      	    
             

    		<label><b>Username</b></label>
    		<input type="text" name="name" class="form-control" required><br>

    		<label><b>Password</b></label>
    		<input type="password" name="pass" class="form-control" required><br>

    		<button name="Login" class="btn btn-success">Login</button><br>
    		
  <div>
  	<p class="text-danger"><?php echo $_GET['user']; ?></p><br> 
    <p><?php echo $_GET['password']; ?></p><br>
    <p><?php echo $_GET['both']; ?></p>
  </div>
       
      </div>	
    </form>

</div>
</body>
</html>

