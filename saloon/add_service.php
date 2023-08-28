<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'connect.php';
        $sql = "select * from shop";
        $res = mysqli_query($connect,$sql);
        echo ' <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Sno</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Address</th>
            <th scope="col">Ratings</th>
            <th scope="col">Email</th>
            <th scope="col">Opening time</th>
            <th scope="col">closing time</th>
            <th scope="col">Hair</th>
            <th scope="col">Skin</th>
            <th scope="col">Nail</th>
            <th scope="col">Massage</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>';
        $sno = 0;
        while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $sno = $sno+1;
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
            echo '<tr>
                    <th scope="row">'.$sno.'</th>
                    <td>'.$name.'</td>
                    <td>'.$date.'</td>
                    <td>'.$address.'</td>
                    <td>'.$ratings.'</td>
                    <td>'.$mail.'</td>
                    <td>'.$open.'</td>
                    <td>'.$close.'</td>
                    <td>'.$hair.'</td>
                    <td>'.$skin.'</td>
                    <td>'.$nail.'</td>
                    <td>'.$massage.'</td>
                    <td>
                    <button type="button" class="btn btn-primary"><a style ="color:white;" href="update.php?id='.$id.'">Update</button>
                    <button type="button" class="btn btn-danger"><a style ="color:white;" href="delete.php?id='.$id.'&name='.$name.'">Delete</button>
                    
                    </td>
                </tr>';
            }
        echo '</tbody>
        </table>';
    echo ' <div style="text-align:center;"><button type="button" class="btn btn-primary"><a style ="color:white;" href="dashboard.php">Back</button></div>'
    ?>
</body>
</html>
