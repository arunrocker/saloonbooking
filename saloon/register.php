<?php
    require 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $user_id =$_POST['id'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        if($connect){
            $sql = "select * from customers where name = '$name'";
            $res = mysqli_query($connect,$sql);
            $num =  mysqli_num_rows($res);
            if($num>0){
                 echo '
                 <script>    
             
                     alert("Already user registered!");
             
                 </script>
             ';
         }
             else{
                 $sql = "INSERT INTO `customers` (`name`,`dob`,`gender`,`address`,`user_id`, `password`,`email`,`phone_number`) VALUES ('$name','$dob','$gender','$address','$user_id','$password','$email','$number')";
                 $res = mysqli_query($connect,$sql);
                 if($res){
                     echo '
                     <script>    
                 
                         alert("Registered Successfully");
                 
                     </script>
                 ';
                 }
                 else{
                     echo mysqli_error($connect);
                 }
             }
            }
        
        else{
            echo '
                <script>    
            
                    alert("connection error");
            
                </script>
            ';
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Style the form container */
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        
        /* Style the form fields */
        input[type="text"], input[type="password"], input[type="email"], textarea {
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 5px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            width: 100%;
        }
        
        /* Style the radio buttons */
        input[type="radio"] {
            margin: 5px;
        }
        
        /* Style the submit button */
        input[type="submit"],button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        
        /* Style the submit button on hover */
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        
        /* Style the form labels */
        label {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        
        /* Style the form container on smaller screens */
        @media only screen and (max-width: 600px) {
            .form-container {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registration Form</h2>
        <form action="register.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="dob">DOB:</label>
            <input type="date" name="dob" id="dob" required>
            
            <label>Gender:</label>
            <input type="radio" name="gender" id="male" value="male" required>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female" required>
            <label for="female">Female</label>
            <br>
            <br>
            <label for="address">Address:</label>
            <textarea name="address" id="address" rows="4" required></textarea>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="id">User ID:</label>
            <input type="text" name="id" id="id" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            
            <label for="number">Phone Number:</label>
            <input type="text" name="number" id="number" required>
            
            <input type="submit" name="submit" value="Submit">
            <button type="submit" name="submit" ><a href="login.php">Back</a></button>
        </form>
    </div>
</body>
</html>