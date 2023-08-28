<!DOCTYPE html>
<html>
<head>
	<title>Profile Card</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: green;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 400px;
			width: 50%;
			text-align: center;
			background-color: #e6f7ff;
			border-radius: 10px;
			padding: 20px;
		}

		.card img {
			animation: spin 2s linear 1;
			border-radius: 50%;
			height: 100px;
			width: 100px;
			margin-bottom: 20px;
		}

		.title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


		.info {
    font-size: 18px;
    color: #666;
    margin-bottom: 10px;
    text-align: left;
    line-height: 1.5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

		@media screen and (max-width: 480px) {
			.card {
				max-width: 100%;
			}
		}

		@keyframes spin {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
  /* stop the animation after one rotation */
  animation-iteration-count: 1;
}
	</style>
    
</head>
<body>

	<?php
	    session_start();
	    include 'connect.php';
	    $id = $_SESSION['id'];
	    $sql = "select * from customers where id ='$id'";
	    $res = mysqli_query($connect,$sql);
	    while($row = mysqli_fetch_assoc($res)){
	?>

	<div class="card">
		<img src="dummypic.png" alt="dummy image">
		<h2 class="title"><?php echo $row['name']; ?></h2>
		<p class="info"><strong>Date of birth:</strong> <?php echo $row['dob']; ?></p>
		<p class="info"><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
		<p class="info"><strong>Address:</strong> <?php echo $row['address']; ?></p>
		<p class="info"><strong>User ID:</strong> <?php echo $row['user_id']; ?></p>
		<p class="info"><strong>Email:</strong> <?php echo $row['email']; ?></p>
		<p class="info"><strong>Phone number:</strong> <?php echo $row['phone_number']; ?></p>
        <button style="background-color:gold;border:none;height:30px; border-radius:4px;" type="submit"><a href="customer_dashboard.php" style="color:white;">Back</a></button>
	</div>

	<?php } ?>

</body>
</html>
