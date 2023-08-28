<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
include 'connect.php';
 if(isset($_GET['id']) && isset($_GET['name'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $sql = "DELETE FROM shop WHERE `shop`.`id` = $id";
    $sql1 = "DROP TABLE shop_$name";
    $res = mysqli_query($connect,$sql);
    $res1 = mysqli_query($connect,$sql1);
    if($res){
        header("location:dashboard.php?delete='success'");
    }
    else{
      echo "error".mysqli_error($connect);
    }
}
else{
    echo "faalsre";
}

?>