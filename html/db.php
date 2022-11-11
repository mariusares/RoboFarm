<?php
if(!$mysqli = new mysqli("127.0.0.1","ceres", "roboceres#")) {
     die('oops connection problem ! --> '.$mysqli->error);
}
if(!$mysqli->select_db("roboceres"))
{
     die('oops database selection problem ! --> '.$mysqli->error);
}

session_start();
//$result = $mysqli->query("SELECT * from users WHERE user_id='" . $_SESSION['user'] . "'");
//$row = $result->fetch_assoc();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}

?>

