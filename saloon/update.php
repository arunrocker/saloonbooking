<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
session_start();
include 'connect.php';
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT *  FROM shop WHERE `id` = $id";
    $res = mysqli_query($connect,$sql);
    if($res){
        $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            $date = $row['date'];
            $address = $row['address'];
            $ratings = $row['ratings'];
            $mail = $row['email'];
            $open = $row['opening_time'];
            $close = $row['closing_time'];
            $hair = $row['hair'];
            $skin = $row['skin'];
            $nail = $row['nail'];
            $massage =$row['massage'];
            $_SESSION['open']=$open;
            $cost_hair =$row['cost_hair'];
            $cost_skin = $row['cost_skin'];
            $cost_nail = $row['cost_nail'];
            $cost_massage = $row['cost_massage'];
         header("location:update_shop.php?id='$id'&name='$name' &date='$date'&address=$address&ratings='$ratings'&mail='$mail'&close='$close'&skin='$skin'&hair ='$hair'&nail ='$nail' &massage='$massage' &cost_hair='$cost_hair' &cost_nail='$cost_nail' &cost_skin='$cost_skin'&cost_massage='$cost_massage'");
    }
    else{
        echo '<alert>
        </alert>';
      header("location:add_service.php");
    }
}
else{
    echo "faalsre";
}

?>