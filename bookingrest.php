<?php

 // Connect to the MySQL database from myphp admind

 $host= "localhost";
 $username = "unn_w20038178";
 $password = "@SomozanO96";
 $dbname = "unn_w20038178";

 $conn = mysqli_connect("localhost", "unn_w20038178", "@SomozanO96", "unn_w20038178");


 // Check  our connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }

 // Get  data
 $name = $_POST['name'];
 $email = $_POST['email'];
 $trip_destination = $_POST['trip_destination'];
 $trip_date = $_POST['trip_date'];

 // Insert the booking into our database
 $sql = "INSERT INTO bookings ( name, email, trip_destination, trip_date) VALUES ('$name', '$email', '$trip_destination', '$trip_date')";
 if (mysqli_query($conn, $sql)) {
     echo "Extreme Booking created successfully";
 } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

 // Close the database connection
 mysqli_close($conn);
?>







?>




