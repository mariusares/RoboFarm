<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $username = $mysqli->real_escape_string($_POST['username']);
 $upass = $mysqli->real_escape_string($_POST['pass']);
 $res=$mysqli->query("SELECT * FROM users WHERE username='$username'");
 $row=$res->fetch_array();
 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('User/Parola Gresite');</script>
        <?php
 }

}

?>

<!doctype html>
<head>
    <title>RoboCeres Automatic System</title>
    <link rel="stylesheet" href="materialize.min.css"/>
    <link href="materialize.css" rel="stylesheet"/>
    <style>
        body {
            background: #F7F9FF;
        }
        #content {
            min-height: 100vh;
        }
        .box {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 15px;
            border-radius: 3px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 2px 3px !important;
            -webkit-box-shadow: rgba(0, 0, 0, 0.25) 0px 2px 3px !important;
        }
        .title {
            font-size: 22px;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
        }
    </style>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="navbar-fixed">
<div id="login-form">
<form method="post">
    <div class="container valign-wrapper" id="content">
        <div class="box white z-depth-5">
           <!-- <div class="title blue-text text-darken-3">Roboceres Log In</div>-->
            <img src="img/robo-farm.png" style="width: calc(100% + 30px);margin-top: -15px;height: auto;margin: -15px -15px 15px -15px;border-radius: 3px 3px 0 0;padding: 10px;" class="brand-logo blue">

            <form class="row">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="pass" placeholder="Password" required />
                <button class="waves-effect waves-dark btn blue darken-1r" style="width: 100%;" type="submit" name="btn-login">Conectare</button>
            </form>
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script src="materialize.min.js"></script>
    <script>
           $(".button-collapse").sideNav();
    </script>
