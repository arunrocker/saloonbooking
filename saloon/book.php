<?php
    session_start();
    include 'connect.php';
    if(isset($_GET['time'])){
        echo '
        <script>    
            alert("Already Booked by Someone:(");
        </script>
    ';
    }
    if(isset($_GET['name'])){
    $_SESSION['shop']=$_GET['name'];
    $_SESSION['stop'] = $_GET['close'];
    $_SESSION['service']=array();
        if($_GET['hair']=='Available') array_push($_SESSION['service'],"hair");
        if($_GET['skin']=='Available')   array_push($_SESSION['service'],"skin");
        if($_GET['nail']=='Available')   array_push($_SESSION['service'],"nail");
        if($_GET['massage']=='Available')  array_push($_SESSION['service'],"massage");
    }
    if(isset($_POST['submit'])){
        $id = $_SESSION['id'];
        $shop = $_SESSION['shop'];
        $date = $_POST['date'];
        $from = $_POST['start'];
        $to = $_POST['end'];
        $ser = $_POST['service'];
        $sql1 = "SELECT * FROM shop where name='$shop'";
        $res1 = mysqli_query($connect,$sql1);
        $sql2 = "SELECT * FROM shop_$shop where `scheduled_on`='$date' and `from_timing`='$from' and `to_time`='$to' and `service` ='$ser'";
        $res2 = mysqli_query($connect,$sql2);
        $n=mysqli_num_rows($res2);
        if(!$res2){
            echo mysqli_error($connect);
        }
        if($n>0){
            header("Location:book.php?time='success'");
        }
        else{
        $service = $_POST['service'];
        $ans =0;
        while($row=mysqli_fetch_assoc($res1)){
            if($_POST['service']=='hair') $ans = $row['cost_hair'];
            if($_POST['service']=='nail') $ans = $row['cost_nail'];
            if($_POST['service']=='skin') $ans = $row['cost_skin'];
            if($_POST['service']=='massage') $ans = $row['massage'];
        }
        $sql ="INSERT INTO `shop_$shop` (`id`,`customer_name`,`scheduled_on`,`from_timing`,`to_time`,`service`,`cost`) VALUES ('$id','{$_POST["name"]}','{$_POST["date"]}','{$_POST["start"]}','{$_POST["end"]}','{$_POST["service"]}','{$ans}')";
        $res = mysqli_query($connect,$sql);
        if(!$res){
            echo mysqli_error($connect);
        }

        header("Location:customer_dashboard.php?status='Added Successfully Wait for your confirmation:)'");
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }
        form {
            margin: 20px auto;
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,.2);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input, select {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        .status {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,.2);
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center">Booking Details</h1>
    <form action="book.php" method="post">
        <label for="name">Customer Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="date">Scheduled Date:</label>
        <input type="date" name="date" id="date" required>
        <label for="start">Start Time:</label>
        <input type="number" name="start" id="start" min="<?php echo $_SESSION['start'];?>" max="<?php echo $_SESSION['stop'];?>" required>
        <label for="end">End Time:</label>
        <input type="number" name="end" id="end" min="<?php echo $_SESSION['start'];?>" max="<?php echo $_SESSION['stop'];?>" required>
        <label for="service">Service:</label>
        <select name="service" id="service" required>
            <?php foreach ($_SESSION['service'] as $ans): ?>
            <option value="<?php echo $ans; ?>"><?php echo ucfirst($ans); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="submit" value="Book Appointment">
        <a href ="customer_dashboard.php">Back</a>
    </form>
</body>
</html>
