<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
    session_start();
    include 'connect.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['dob'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $ratings = $_POST['rate'];
        $open = $_POST['opening'];
        $close = $_POST['closing'];
        $hair = isset($_POST['hair'])?$_POST['hair']:"Not Available";
        $skin =isset($_POST['skin'])?$_POST['skin']:"Not Available";
        $nail = isset($_POST['nail'])?$_POST['nail']:"Not Available";
        $massage =isset($_POST['massage'])?$_POST['massage']:"Not Available";
        $cost_hair =$_POST['cost_hair'];
        $cost_skin =$_POST['cost_skin '];
        $cost_nail =$_POST['cost_nail'];
        $cost_massage =$_POST['cost_massage'];
        $sql ="Update `shop` set name ='$name',date='$date',address='$address',ratings='$ratings',opening_time='$open',closing_time='$close',hair ='$hair',skin='$skin',nail='$nail',massage='$massage',cost_hair='$cost_hair',cost_nail='$cost_nail',cost_skin='$cost_skin',cost_massage='$cost_massage' where id  =$id";
        $res = mysqli_query($connect,$sql);
        if($res){
            header("Location:dashboard.php?alert='success'");
        }
        else{
            echo mysqli_error($con);
            echo '<div class="alert alert-danger" role="alert">
            Sry :( error !
          </div>';
        }



    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employees</title>
    <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        h1 {
            padding-top: 40px;
            padding-left: 50px;
        }
    </style> 
</head>
<body>
    <h1>Update Company</h1>
    <div>
      <pre>
        <form action="Update_shop.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <label for="fname">Name:</label>
            <input type="text" name="name" value=<?php echo $_GET['name'] ?>>
            Started On: <input type="date" name="dob" value="<?php echo $_GET['date'] ?>"><br>
            Company email: <input type="email" size="40" name="email" value=<?php echo $_GET['mail'] ?>><br>
            Ratings: <input type="range" min="1" max="5" step="1" name ="rate" value=<?php echo $_GET['ratings'] ?>><br>
            Opening time: <input type="number" name="opening" min="1" max="24" value=<?php echo $_SESSION['open'] ?>><br>
            Closing time: <input type="number" name="closing" min="1" max="24" value=<?php echo $_GET['close'] ?>><br>
            Services: <br>
            <hr>
            Hair treatment: <input type="checkbox" name="hair" value="Available"><br>
            Nail treatment: <input type="checkbox" name="nail" value="Available"><br>
            Skin treatment: <input type="checkbox" name="skin" value="Available"><br>
            Massages: <input type="checkbox" name="massage" value="Available"><br>
            <hr>
            Cost for Hair treatment: <input type="text" name="cost_hair" value=<?php echo $_GET['cost_hair'] ?>><br>
            Cost for Nail treatment: <input type="text" name="cost_nail" value=<?php echo $_GET['cost_nail'] ?>><br>
            Cost for Skin treatment: <input type="text" name="cost_skin" value=<?php echo $_GET['cost_skin'] ?>><br>
            Cost for Massages: <input type="text" name="cost_massage" value=<?php echo $_GET['cost_massage'] ?>><br>
            Address: 
            <textarea name="address" rows="4" cols="50"><?php echo $_GET['address'] ?></textarea><br>
            <input type="submit" class="btn btn-dark" name="submit"><br>
            <button type="submit" class="btn btn-dark"><a href="dashboard.php" style="color:white;">Back</a></button>
        </form>
      </pre>
    </div>
</body>
</html>