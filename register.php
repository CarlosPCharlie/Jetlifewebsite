<?php
session_start();
// get the funcion session start
require 'config.php';
$conn = mysqli_connect("localhost", "unn_w20038178", "@SomozanO96", "unn_w20038178");
//conexion to our data base

if(!empty($_SESSION["id"])){
  header("Location: myWeb.php");
}
// Check if the form has been submitted
if(isset($_POST["submit"])){
  // Get the values of the form fields from the $_POST array and store them in variables in our data base as done it before in other databases
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  //We need to check if the entered username or email already exists in our database
  $duplicate = mysqli_query($conn, "SELECT * FROM registration WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email is already taken!'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO registration VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      // If we find a duplicate we should display and create an alert message
      "<script> alert('Registration Successful!'); </script>";
    }
    else{
      echo
      // If we find a duplicate we should display and create an alert message
      "<script> alert('Password Does Not Match!'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
         <!--Our link with our css style sheet to style our web--->
         <link rel="stylesheet" href="css/styles.css">
         
         <link rel ="stylesheet" href="css/styleForm.css">
        <title>sign up or registration</title>

    </head>
  
    <body>
         <!--As many websites, we mantain the logo and navigation bar of website to promote accesiblity and for the user--->
        <header>
           <!--As many websites, we include the funcionality of coming back to the index by clicking the logo or the main image.--->
            <img src="img/JET_prev_ui.png" alt="logoImage">
            <a href="myWeb.php" class="logo"><em>Jet</em> <em>Life</em> Canary Islands</a>
        </header>
        <!--we create the registration form using form tag +label and with the required input. As it is shownin the following code-->
        <form>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    <!--
  </div>
    <br>
    <div class="loginbt">
    <a href="logIn.php"><buttom type="Login" name="Login"> Log in </buttom></a>
  </div>-->
    </body>
</html>


	
	




