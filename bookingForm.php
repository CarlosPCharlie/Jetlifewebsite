
<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Not logged in, redirect to login page or logIn.php
    header("Location: logIn.php");
    exit;
}


// Connect to the MySQL database nut also we could use require:config.php.However I wanted to practice both ways

$host= "localhost";
$username = "unn_w20038178";
$password = "@SomozanO96";
$dbname = "unn_w20038178";

$conn = mysqli_connect("localhost", "unn_w20038178", "@SomozanO96", "unn_w20038178");


// Check connection in case it fails with if statement
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data to get the booking


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['trip_destination']) && isset($_POST['trip_date'])) {
    // Sanitize the data with our sanitizing functions and filter to protect us from SQL injection or cross-site scripting (XSS) more can be found in the security pdf in the nav bar 
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $trip_destination = filter_var($_POST['trip_destination'], FILTER_SANITIZE_STRING);
    $trip_date = filter_var($_POST['trip_date'], FILTER_SANITIZE_STRING);

    // Assign the sanitized data to the corresponding variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $trip_destination = $_POST['trip_destination'];
    $trip_date = $_POST['trip_date'];
}


// Insert the booking into the database using our inser into with its correspondent values
$sql = "INSERT INTO bookings ( name, email, trip_destination, trip_date) VALUES ('$name', '$email', '$trip_destination', '$trip_date')";
if (mysqli_query($conn, $sql)) {
    echo "Extreme Booking created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection using the fucntion
mysqli_close($conn);

?>

<<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
        <link rel ="stylesheet" href="css/styleForm.css">
    </head>
      <!--As many websites, we mantain the logo and navigation bar of website to promote accesiblity and for the user--->
      <header>
           <!--As many websites, we include the funcionality of coming back to the index by clicking the logo or the main image.--->
            <img src="img/JET_prev_ui.png" alt="logoImage">
            <a href="myWeb.php" class="logo"><em>Jet</em> <em>Life</em> Canary Islands</a>
        </header>
    <body>
<div class="bookingForm">
    <form method="POST" action="bookingForm.php">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br>
  <label for="trip_destination">Trip Destination:</label><br>
  <input type="text" id="trip_destination" name="trip_destination"><br>
  <label for="trip_date">Trip Date:</label><br>
  <input type="text" id="trip_date" name="trip_date"><br>
  <input type="submit" value="Submit">
   </form> 
</div>
    </body>

</html>