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
    if(isset($_POST['submit'])){
        $saloon = $_POST['shop'];
        $date = $_POST['date'];
    $sql = "SELECT * from shop_$saloon where `status` ='Accepted' and `scheduled_on` ='$date'";
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
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>';
        $sno=0;
        while($row = mysqli_fetch_assoc($res)){
            $sno = $sno+1;
            echo '<tr>
                    <th scope="row">'.$sno.'</th>
                    <td>'.$row['customer_name'].'</td>
                    <td>'.$row['scheduled_on'].'</td>
                    <td>'.$row['from_timing'].'</td>
                    <td>'.$row['to_time'].'</td>
                    <td>'.$row['service'].'</td>
                    <td>'.$row['status'].'</td>
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
    <title>Document</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy1HzWoeIdP+woJXu6TTHQUsqqbynAgFJjZfB1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="accepted.php" method="post">
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
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn btn-primary" type="submit"><a href="dashboard.php" style="color:white;">Back</a></button>
        </form>
    </div>
    <!-- Add Bootstrap JS and jQuery links -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
