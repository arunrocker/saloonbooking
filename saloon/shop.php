<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
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
        $cost_hair =isset($_POST['hair'])?$_POST['cost_hair']:"0";
        $cost_skin =isset($_POST['skin'])?$_POST['cost_skin']:"0";
        $cost_nail =isset($_POST['nail'])?$_POST['cost_nail']:"0";
        $cost_massage =isset($_POST['massage'])?$_POST['cost_massage']:"0";
        $sql = "select * from shop where name = '$name'";
           $res = mysqli_query($connect,$sql);
            $num =  mysqli_num_rows($res);
            if($num>0){
                echo '
                <script>    
                     alert("Already shop registered!");       
                </script>
             ';
         }
            else{
                 $sql = "INSERT INTO `shop` (`name`,`date`,`address`,`ratings`,`email`,`opening_time`,`closing_time`,`hair`,`skin`,`nail`,`massage`,`cost_hair`,`cost_nail`,`cost_skin`,`cost_massage`) VALUES ('$name','$date','$address','$ratings','$email','$open','$close','$hair','$skin','$nail','$massage','$cost_hair','$cost_nail','$cost_skin','$cost_massage')";
                 $sql1 = "CREATE TABLE `shop_$name` (id INT NOT NULL , customer_name VARCHAR(255) NOT NULL ,scheduled_on VARCHAR(255) NOT NULL , ratings INT NOT NULL , from_timing INT NOT NULL , to_time INT NOT NULL,service VARCHAR(255) NOT NULL,status VARCHAR(255) DEFAULT 'pending',cost INT(255) NOT NULL)";
                 $res = mysqli_query($connect,$sql);
                 $res1 = mysqli_query($connect,$sql1);
                 if($res){
                     echo '
                     <script>    
                 
                         alert("Registered Successfully");
                 
                     </script>
                 ';
                }
                 else if($res1){
                    echo mysqli_error($connect);
                 }
                 else{
                    echo mysqli_error($connect);
                 }
             }
            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        label {
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }
        input[type=text],
        input[type=email],
        input[type=date],
        input[type=number],
        input[type=range],
        textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #f5f5f5;
            margin-bottom: 20px;
            font-size: 16px;
            color: #333;
        }
        input[type=range] {
            margin-bottom: 0;
        }
        input[type=checkbox] {
            margin-right: 10px;
        }
        button[type=submit] {
            background-color: #1e90ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        button[type=submit]:hover {
            background-color: #187bcd;
        }
    </style>
</head>
<body>
    <h1>Shop Details</h1>
    <form action="shop.php" method="post">
        <label for="name">Shop name:</label>
        <input type="text" id="name" name="name" required>

        <label for="dob">Started On:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <label for="email">Company email:</label>
        <input type="email" id="email" name="email" required>

        <label for="rate">Ratings:</label>
        <input type="range" id="rate" name="rate" min="1" max="5" step="1" required>

        <label for="opening">Opening time:</label>
        <input type="number" id="opening" name="opening" min="1" max="24" required>

        <label for="closing">Closing time:</label>
        <input type="number" id="closing" name="closing" min="1" max="24" required>

        <label>Services:</label>
        <input type="checkbox" id="hair" name="hair" value="Available">Hair treatment
        <input type="checkbox" id="nail" name="nail" value="Available">Nail treatment
        <input type="checkbox" id="skin" name="skin" value="Available">Skin treatment
        <input type="checkbox" id="massage" name="massage" value="Available">Massages
        <br>
        <br>
        <label for="cost_hair">Cost for Hair treatment:</label>
    <input type="text" id="cost_hair" name="cost_hair" value="0" required>

    <label for="cost_nail">Cost for Nail treatment:</label>
    <input type="text" id="cost_nail" name="cost_nail" value="0" required>

    <label for="cost_skin">Cost for Skin treatment:</label>
    <input type="text" id="cost_skin" name="cost_skin" value="0" required>

    <label for="cost_massage">Cost for Massages:</label>
    <input type="text" id="cost_massage" name="cost_massage" value="0" required>

    <button type="submit" name="submit">Submit</button>
    <button type="submit"><a href="dashboard.php" style="color:white;">Back</a></button>
</form>
</body>
</html> 