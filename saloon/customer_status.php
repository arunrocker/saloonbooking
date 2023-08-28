<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
    session_start();
    $_SESSION['shops']=array();
    include 'connect.php';
    $sql = "SELECT * from shop";
    $res =mysqli_query($connect,$sql);
    while($row = mysqli_fetch_assoc($res)){
        array_push($_SESSION['shops'],$row['name']);
    }
    if(isset($_GET['state'])){
        echo '
        <script>    
    
            alert("Accepted Successfully:) ");
    
        </script>
    ';
    }
    if(isset($_GET['reject'])){
        echo '
        <script>    
    
            alert("Rejected Successfully:) ");
    
        </script>
    ';
    }
    if(isset($_POST['submit'])){
        $saloon = $_POST['shop'];
    $id =0;
    $date = $_POST['date'];
    $sql = "SELECT * from shop_$saloon where status ='pending' and scheduled_on='$date'";
    $res = mysqli_query($connect,$sql);
    echo ' <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Sno</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Service</th>
            <th scope="col">Cost</th>
            <th scope="col">Status</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>';
        $sno=0;
        while($row = mysqli_fetch_assoc($res)){
            $sno = $sno+1;
            $id = $row['id'];
            echo '<tr>
                    <th scope="row">'.$sno.'</th>
                    <td>'.$row['customer_name'].'</td>
                    <td>'.$row['scheduled_on'].'</td>
                    <td>'.$row['from_timing'].'</td>
                    <td>'.$row['to_time'].'</td>
                    <td>'.$row['service'].'</td>
                    <td>'.$row['cost'].'</td>
                    <td>'.$row['status'].'</td>
                    <td>
                    <button type="button" class="btn btn-primary"><a style ="color:white;" href="accept.php?id='.$id.'&name='.$row['customer_name'].'&saloon='.$saloon.'">ACCEPT</a></button>
                    <button type="button" class="btn btn-danger"><a style ="color:white;" href="reject.php?id='.$id.'&name='.$row['customer_name'].'&saloon='.$saloon.'">REJECT</a></button>
                    </td>
                </tr>';
            }
        echo '</tbody>
        </table>';
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Customer Status</title>
</head>
<body>
    <div class="container mt-3">
        <form action="customer_status.php" method="post">
            <div class="form-group">
                <label for="shop">Select Shop:</label>
                <select class="form-control" id="shop" name="shop">
                    <?php
                    foreach ($_SESSION['shops'] as $shop) {
                        echo "<option value='$shop'>$shop</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Select Date:</label>
                <input class="form-control" type="date" id="date" name="date">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            <button class="btn btn-primary" type="submit"><a href="dashboard.php" style="color:white;">Back</a></button>
        </form>
    </div>
</body>
</html>
