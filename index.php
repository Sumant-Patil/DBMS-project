<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div id="navbar">
        <br>
        <a id ="logo"href="login.html" target="_main"><img id="img1"src="airplane-ticket.png"><h>Booking App</h></a>
        <a id="if"href="#"><img id="img1"src="cashback.png" alt="">Refunds</a>
        <a id="df"href="#"target ="_main"><img id="img1"src="customer-service.png" alt="">Customer care</a>
        <a id="booking" href="" target="_main"><img id="img1"src="airplane.png" alt="">  My Bookings</a>
    </div>
    <br>
    <br>
    <img id="bgimg" src = "images/plane.jpeg" width="500">
    <div class="data">
        <br>
        <br>
        <form action="search.php" method="POST">
            <input type="date" id="date" placeholder="date of travell">
            <input type="text" class="inputcity" name="a_city"placeholder="departure city">
            <button id="to">to</button>
            <input type="text"class="inputcity"  name="d_city"placeholder="arrival city">
            <button id="search">Search</button>
        </form>
    </div>
</body>
</html>