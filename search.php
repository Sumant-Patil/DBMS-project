<?php
    $servername = "localhost";  
    $username = "root";         
    $password = "";             
    $dbname = "user_details";   
     
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $arrival_city = mysqli_real_escape_string($conn, $_POST['a_city']);
    $departure_city = mysqli_real_escape_string($conn, $_POST['d_city']);

    $a_city = strtolower($arrival_city);
    $d_city = strtolower($departure_city);

    $query = "select * from flights where arrival_city='$a_city'and departure_city='$d_city'";
    $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class = "card-header">
                        <h1>according to your search</h1>
                    </div>
                    <div class="card-body">
                        <table class="table-border">
                            <tr>
                                <td>flight ID</td>
                                <td>From</td>
                                <td>to</td>
                                <td>seats</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['arrival_city']?></td>
                                        <td><?php echo $row['departure_city']?></td>
                                        <td><?php echo $row['seats']?></td>
                                        <td><?php echo $row['price']?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>