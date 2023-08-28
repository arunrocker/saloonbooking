<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
include 'connect.php';
 if(isset($_GET['id']) && isset($_GET['name'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $saloon = $_GET['saloon'];
    $sql = "DELETE FROM shop_$saloon WHERE `id` = '$id' and `customer_name`='$name'";
    $res = mysqli_query($connect,$sql);
    if($res){
       header("Location:status.php");
    }
}

?>