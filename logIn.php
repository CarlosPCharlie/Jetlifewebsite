<?php
session_start();
// Set the logged_in variable to true
$_SESSION['logged_in'] = true;

// we use require to add the values that help us with the connection
require 'config.php';
//if it the session is empty just redirect to index or my web .php
if(!empty($_SESSION["id"])){
  header("Location: myWeb.php");
}
// Check if the form has been submitted
if(isset($_POST["submit"])){
  // Get the value of the "usernameemail" and the other values fields from the $_POST array previously seen and store it in a variable
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM registration WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: myWeb.php");
    }
    else{
      // we create our message alert using the if else.
      echo
      "<script> alert('Wrong Password!'); </script>";
    }
  }
  //one more time in case the user is not regiestered in our data base
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  
   <!--Our link with our css style sheet to style our web--->
   <link rel="stylesheet" href="css/styles.css">
   <link rel ="stylesheet" href="css/styleForm.css">

        <title>Sign Up</title>

    </head>
  
    <body>
         <!--As many websites, we mantain the logo and navigation bar of website to promote accesiblity and for the user--->
        <header>
           <!--As many websites, we include the funcionality of coming back to the index by clicking the logo or the main image.--->
            <img src="img/JET_prev_ui.png" alt="logoImage">
            <a href="myWeb.php" class="logo"><em>Jet</em> <em>Life</em> Canary Islands</a>
        </header>
  <!--We create a basic login in form for the users.--->
    <div class="login">
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    </div>
    <br>
    <div class= "registrationYet">
    <a href="register.php">Are you not registered yet?</a>
    </div>
    
  </body>
</html>