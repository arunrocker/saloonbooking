
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php
        session_start();
        include 'connect.php';
        $sql = "select * from shop";
        $res = mysqli_query($connect,$sql);
        echo '<div class="card-deck">';
        while($row = mysqli_fetch_assoc($res)){
            $name = $row['name'];
            $address = $row['address'];
            $ratings = $row['ratings'];
            $hair = $row['hair'];
            $skin = $row['skin'];
            $nail = $row['nail'];
            $open =$row['opening_time'];
            $_SESSION['start'] = $open;
            $close = $row['closing_time'];
            $massage =$row['massage'];
            $cost_hair =$row['cost_hair'];
            $cost_skin =$row['cost_skin'];
            $cost_nail =$row['cost_nail'];
            $cost_massage =$row['cost_massage'];
            echo '<div class="card">
                    <div class="card-header">
                        <h5 class="card-title">'.$name.'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">'.$address.'</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Ratings: '.$ratings.'</p>
                        <p class="card-text">Opening Time: '.$open.'</p>
                        <p class="card-text">Closing Time: '.$close.'</p>
                        <p class="card-text">Hair: '.$hair.'</p>
                        <p class="card-text">Skin: '.$skin.'</p>
                        <p class="card-text">Nail: '.$nail.'</p>
                        <p class="card-text">Massage: '.$massage.'</p>
                        <p class="card-text">Cost Hair: '.$cost_hair.'</p>
                        <p class="card-text">Cost Skin: '.$cost_skin.'</p>
                        <p class="card-text">Cost Nail: '.$cost_nail.'</p>
                        <p class="card-text">Cost Massage: '.$cost_massage.'</p>
                        <button type="submit" class="btn btn-primary"><a style="color:white;" href="book.php?name='.$name.'&skin='.$skin.'&hair='.$hair.'&nail='.$nail.'&massage='.$massage.'&close='.$close.'" class="card-link">Book</a></button>
                    </div>
                </div>';
            }
        echo '</div>';
        echo '<div style="text-align:center;"><button type="button" class="btn btn-primary"><a style ="color:white;" href="customer_dashboard.php">Back</button></div>';
        ?>
</body>
</html>
