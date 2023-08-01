<?php
session_start();
require 'config.php';
$conn = mysqli_connect("localhost", "unn_w20038178", "@SomozanO96", "unn_w20038178");

if(!empty($_SESSION["id"])){
  header("Location: myWeb.php");
} 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM excursions WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h1>Excursion:</h1>";
            echo "Name: " . $row["name"]. "<br> Description: " . $row["description"]. "<br> Price: " . $row["price"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}else{
    $sql = "SELECT * FROM excursions";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<h1>Excursion List</h1>";
        echo "<ul>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li><a href='?id=".$row["id"]."'>".$row["name"]."</a></li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}

$conn->close();
