<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="navbar">
        <h1>Login</h1>
    </div>
    <div>
        <form action="login.php" method="POST">
            <br><br>
            <input id="user" type="text" name="email" placeholder="Email" required>
            <br><br>
            <input id="user" type="password" name="password" placeholder="Password" required>
            <br><br>
            <br><br>
            <input type="submit" id="login" value="Login">
            <br><br>
            <hr class="separator left" width="200px">
            <br>
            <div id="signin"><a href="signup.php">Sign Up</a></div>
        </form>
    </div>
</body>
</html>
<?php
    session_start();

    $servername = "localhost";  
    $username = "root";         
    $password = "";             
    $dbname = "user_details";   

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Check if the user exists in the database
        $query = "SELECT * FROM signup WHERE email='$user_email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch user data
            $user = mysqli_fetch_assoc($result);

            // Verify password (if hashed passwords are used, verify with password_verify)
            if ($user['password'] == $password) {
                $_SESSION['email']=$user_email;
                header("Location: index.php?message=Login Successful");
                exit();
            } else {
                echo "Incorrect password.";
            }
        } else {
            header("Location: signup.php?message= signup you don't have an account");
            exit();
        }
    }

    // Close the connection
    $conn->close();
?>
