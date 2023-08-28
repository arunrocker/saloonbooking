<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name =$_POST['user_id'];
        $pass =$_POST['password'];
    $sql = "insert into admin(`name`,`password`) values('$name','$pass')";  
    $res = mysqli_query($connect,$sql);
    if($res){
        header("Location:dashboard.php?status='success'");
    }    
    else{
        echo mysqli_error($connect);
    }
    }    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<style>
		form {
			margin: 50px auto;
			padding: 20px;
			border: 1px solid #ccc;
			width: 500px;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"],
		input[type="password"] {
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 20px;
			width: 80%;
		}
		input[type="submit"],button {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
    <h1 style="text-align:center;">Add Admin</h1>
	<form action="addadmin.php" method="post">
		<label for="user_id">User ID:</label>
		<input type="text" id="user_id" name="user_id" required>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>

		<input type="submit" name="submit">
        <button type="submit"><a href="dashboard.php" style="color:white;">Back</a></button>
	</form>
</body>
</html>