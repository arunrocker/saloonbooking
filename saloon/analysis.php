<!DOCTYPE html>
<html>
<head>
	<title>Progress Bar Example</title>
	<style>
		.progress {
			height: 20px;
			background-color: #ddd;
			border-radius: 10px;
			margin-bottom: 10px;
			overflow: hidden;
		}
		.bar {
			height: 100%;
			background-color: green;
			text-align: center;
			line-height: 20px;
			color: white;
            color:white;
		}
        .card {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        h1,h2{
            color:white;
        }
        h1,h2:hover{
            color:gold;
        }

	</style>
</head>
<body style="background-color:black;">
<h1 style="text-align:center;">Analysis</h1>
	<?php
		session_start();
		$id = $_SESSION['id'];
		include 'connect.php';
		$shop = array();
		$sql = "SELECT * FROM shop";
		$res = mysqli_query($connect,$sql);
		$cost_nail = 0;
		$cost_skin = 0;
		$cost_hair = 0;
		$cost_massage = 0;
        $count1 = 0;
		$count2 = 0;
		$count3 = 0;
		$count4 = 0;
		while($row=mysqli_fetch_assoc($res)){
			array_push($shop,$row['name']);
		}
		foreach($shop as $temp){
			$sql ="SELECT * FROM shop_$temp WHERE id='$id' AND status='Accepted' AND service ='nail'";
			$res = mysqli_query($connect,$sql);
			while($row = mysqli_fetch_assoc($res)){
				$cost_nail = $cost_nail+$row['cost'];
                $count1 +=1;
			}
			$sql ="SELECT * FROM shop_$temp WHERE id='$id' AND status='Accepted' AND service ='hair'";
				$res = mysqli_query($connect,$sql);
			while($row = mysqli_fetch_assoc($res)){
				$cost_hair = $cost_hair+$row['cost'];
                $count2+=1;
			}
			$sql ="SELECT * FROM shop_$temp WHERE id='$id' AND status='Accepted' AND service ='skin'";
			$res = mysqli_query($connect,$sql);
			while($row = mysqli_fetch_assoc($res)){
				$cost_skin = $cost_skin+$row['cost'];
                $count3+=1;
			}
			$sql ="SELECT * FROM shop_$temp WHERE id='$id' AND status='Accepted' AND service ='massage'";
			$res = mysqli_query($connect,$sql);
			while($row = mysqli_fetch_assoc($res)){
				$cost_massage = $cost_massage+$row['cost'];
                $count4+=1;
            }
		}
		$total = $cost_hair + $cost_nail + $cost_massage + $cost_skin;
	?>
    <div class="card">
	<div class="progress">
		<div class="bar" style="width: <?php echo ($cost_nail / $total) * 100 ?>%"><?php echo "Nail: Rs." . $cost_nail ?></div>
    </div>
    <h2 style="text-align:center;">Total No. of Nail treatment:<?php echo $count1 ?></h2>
    </div>
    <br>
    <div class="card">
	<div class="progress">
		<div class="bar" style="width: <?php echo ($cost_hair / $total) * 100 ?>%"><?php echo "Hair: Rs." . $cost_hair ?></div>
	</div>
    <h2 style="text-align:center;">Total No. of Hairtreatment:<?php echo $count2 ?></h2>
    </div>
    <br>
    <div class="card">
	<div class="progress">
		<div class="bar" style="width: <?php echo ($cost_skin / $total) * 100 ?>%"><?php echo "Skin: Rs." . $cost_skin ?></div>
	</div>
    <h2 style="text-align:center;">Total No. of Skin treatment:<?php echo $count3 ?></h2>
    </div>
    <br>
    <div class="card">
	<div class="progress">
		<div class="bar" style="width: <?php echo ($cost_massage / $total) * 100?>"><?php echo "Massage: Rs." . $cost_massage ?></div>
</div>
<h2 style="text-align:center;">Total No. of Massage treatment:<?php echo $count4 ?></h2>
</div>
<br>    
<div>
<h1 style="text-align:center;">Total Cost: Rs.<?php echo $total ?></h1><div style="text-align:center;"> <button type="submit" style="color:red;background-color:gold;border:none;border-radius:4px;height:30px;width:60px;" value="Back"><a href="customer_dashboard.php" style="color:white;">Back</a></button></div>
</div>
</body>
</html>