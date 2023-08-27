<?php

session_start();
$con = new mysqli("localhost","root","mysql","school");

if(isset($_SESSION['student'])or (isset($_COOKIE['email'])and isset($_COOKIE['password']))){
    header ('location: student.php');

    $email = '';
    $password = '';
    require('connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="margin: 0;
  min-height: 100%;
  display: flex;
  flex-direction: column;
  background-color: rgb(243,241,238)">
<header style="color: #ffffff;background-color: #a8b3c0;display: block; min-height: 80px">

    <div>
        <div >
            <h1 style="font-family: 'Book Antiqua',serif;margin-left: 100px;margin-top: 20px">LOGO</h1>
        </div>
</header>
<div class="container">
    <form action="student.php" method="post" >
        <h3 class="text-center" style="color:#a8b3c0;font-weight:bold; margin-top:80px;">Login Student</h3>
        <div class="form" >
            <label for="exampleInputEmail1"style="color:#a8b3c0;font-weight:bold; margin-top:35px;margin-left:500px;margin-bottom:15px;">
                Email</label>
            <input style="margin-left:500px;width:260px; " type="email" class="form-control" required name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form">
            <label for="exampleInputPassword1"style="color:#a8b3c0;font-weight:bold;  margin-top:30px;margin-left:500px;margin-bottom:15px;">
                Password</label>
            <input style="margin-left:500px;width:260px;" type="password" class="form-control" required name="password" id="exampleInputPassword1" placeholder="Password">
        </div><br>
        <button id="button" type="submit" name="signin" class="btn mb-2" style="color:white;background-color:#a8b3c0;font-weight:bold; margin-top:20px;margin-left:600px;">
            Submit</button>
    </form>
</div>
</body>
</html>