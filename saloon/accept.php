<?php
include 'connect.php';
if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['saloon'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $saloon = $_GET['saloon'];
    $sql ="UPDATE `shop_$saloon` SET status = 'Accepted' WHERE `id` = '$id' AND `customer_name` = '$name'";
    $res = mysqli_query($connect,$sql);
    if(!$res){
        echo mysqli_error($connect);
    }
    else{
       header("Location:customer_status.php?state='sucess'");
    }
}
?>
