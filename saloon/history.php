<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Booking History</title>
    
    <style>
        h1 {
            text-align: center;
        }
        body {
            background-color: #f2f2f2;
        }
        
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        th {
            background-color: #007bff;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1 >History Details</h1>
    <div class="container my-4">
        <form action="history.php" method="post">
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Select a shop:</label>
                <div class="col-sm-10">
                    <select name="shop" class="form-control">
                        <?php
                            session_start();
                            foreach ($_SESSION['shops'] as $shop) {
                                echo "<option value='$shop'>$shop</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <input type="submit" name="submit" class="btn btn-primary">
                    <button type="submit" class="btn btn-primary"><a href="customer_dashboard.php" style="color:white;">Back</a></button>
   
                </div>
            </div>
        </form>
    </div>
    
    <?php
    include 'connect.php';
        if(isset($_POST['submit'])){
            $saloon = $_POST['shop'];
            $id = $_SESSION['id'];
            $sno = 0;
            $sql = "SELECT * from shop_$saloon where id ='$id'";
            $res = mysqli_query($connect, $sql);
            
            echo '<div class="container my-4">';
            echo '<table class="table table-hover">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">Sno</th>';
            echo '<th scope="col">Name</th>';
            echo '<th scope="col">Date</th>';
            echo '<th scope="col">From</th>';
            echo '<th scope="col">To</th>';
            echo '<th scope="col">Service</th>';
            echo '<th scope="col">Cost</th>';
            echo '<th scope="col">Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            while($row = mysqli_fetch_assoc($res)){
                $sno = $sno + 1;
                echo '<tr>';
                echo '<td scope="row">' . $sno . '</td>';
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['scheduled_on'] . '</td>';
                echo '<td>' . $row['from_timing'] . '</td>';
                echo '<td>' . $row['to_time'] . '</td>';
                echo '<td>' . $row['service'] . '</td>';
                echo '<td>' . $row['cost'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    ?>
</body>
</html>
