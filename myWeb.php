<?php
// please log in in red will appear in the website
session_start();
// create function is Loggein to check with the if statement and session
function isLoggedIn() {
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      return true;
  } else {
      return false;
  }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <!--we add our metadata information in the head section for Jet life website-->
     <meta charset="UTF-8">
     <meta name="description" content="Jet Life Canary island website">
     <meta name="Jet Life Canary" content="HTML,CSS">
     <meta name="Carlos Beleret" content="responsive website assigment">
     
         <!--Our link with our css style sheet to style our web--->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="" href="">
        <title>Jet Life Canary Islands</title>
    </head>
     <!--Let's divide our website into sections header home, container and footer--->
    <body>
        <header>  
            <!--Logo as text and logo created ny Canva for free--->
     <img src="img/JET_prev_ui.png" alt="logoImage">
     <a href="#" class="logo"><em>Jet</em> <em>Life</em> Canary Islands</a>

       
        
    </header>
      <!--Navitagion responsive menu with links of each section--->
    <div class="navbar">
        
         <a href="myWeb.php">Home</a>
         <a href="aboutUs.html">About us</a>
         <a href="bookings.html">Booking</a>
         <a href="excursions.html">Excursions</a>
         <a href="ourJets.html">Our Jets</a>
         <a href="contactUs.html">Contact</a>
         
        
         <a href="credits.html">Credits</a>
         <a href="./secure.pdf" alt="Wire frame">Web Security</a>
         <a href="register.php"> Sign Up</a>  
         <?php 
       if(isLoggedIn()) {
        echo '<p class="logged-in">Welcome, you are logged in.</p>';
    } else {
        echo '<p class="logged-out">You are not logged in. Please <a href="logIn.php">Login</a>.</p>';
    }
    
    ?>
     <a href="logOut.php">Log Out</a>

         
    </div>
     

    <!--Home section to display text content and our first image with classes--->
	<section class="home" id="home">
		<div class="home-text">
            <br>
            <br>
			<h1><span>D</span><span>a</span><span>r</span><span>e</span> to live your 
                life <br>to the<br>EXTREME</h1> 
		</div>
        <br>
        <a href="https://www.youtube.com/watch?v=NNJiqLKASQ4&t=23s" class="linkNow">Ready?</a>
	</section>
    <!--This is the footer section of our travel website-->
    <footer>
        <div class="footer-container">
          <div class="footer-row">
            <div class="footer-col">
              <h3>About</h3>
              <p>This website is a platform for users who are trying to find purpose  and book travel deals, share travel experiences and connect with other travellers.</p>
            </div>
            <div class="footer-col">
                <h3><a href="contactUs.html"> Contact Us</a></h3>
              <ul>
                <li>Email: jetLifeCanaryIsland@hotmail.com</li>
                <li>Phone: +44 20038178</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="copyright">
          <div class="container">
            <p>Copyright ©2022/23 Carlos Emilio Beleret</p>
          </div>
        </div>
      </footer>
      
      



<!--footer Ssection for our contact and support--->

<!--wireframe and desing notes
<div class="wireframe">
    <a href="./desingNotesAndWireframe.pdf" alt="Wire frame">Wire Frame</a>
    </div>--->
        

        
    

         


  

 </body>



</html>

