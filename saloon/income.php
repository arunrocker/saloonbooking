
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* Add border to table */
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        
        /* Add font decoration to table headers */
        .thead-dark th {
            font-weight: bold;
            font-size: 1.2em;
        }
        
        /* Add background color to table rows on hover */
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        /* Add margin and padding to form */
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        
        /* Add margin and padding to submit button */
        input[type="submit"] {
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        
        /* Add margin to table rows */
        tbody tr {
            margin-bottom: 10px;
        }
        
        /* Add margin to delete button */
        .btn-danger {
            margin-top: 5px;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Income Stats </h1>
    <form action="income.php" method="post">
        <select name="shop" class="form-control">
            <?php
            session_start();
            foreach ($_SESSION['shops'] as $shop) {
             echo "<option value='$shop'>$shop</option>";
            }
            ?>
        </select>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-primary" value="Back"><a href="dashboard.php" style="color:white;">Back</a></button>
   
    </form>
    <?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $shop = $_POST['shop'];
        $sql = "select * from shop_$shop where status ='Accepted'";
        $res = mysqli_query($connect,$sql);
        $cost = 0;
        $count =0;
        $sno =0;
        echo '<table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Service</th>
                <th scope="col">Status</th>
                <th scope="col">Cost</th>
            </tr>
        </thead>
        <tbody>';
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
                    <td>'.$row['cost'].'</td>
                </tr>';
            $cost += $row['cost'];
            $count+=1;
        }
        echo '</tbody>
        </table>';
        echo "<h1> Total Cost :".$cost."</h1><br>";
        echo "<h1> Total Customers :".$count."</h1><br>";

        if(!$res){
            echo mysqli_error($connect);
        }
    }
?>