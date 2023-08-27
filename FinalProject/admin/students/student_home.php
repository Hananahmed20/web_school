<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="margin: 0;
  min-height: 100%;
  /*display: block;*/
  flex-direction: column;
  background-color: rgb(243,241,238)">

<header style="color: #ffffff;background-color: #bebebe; min-height: 80px;display: flex">
    <div >
        <h1 style="font-family: monospace;margin-left: 50px;color: #625C5CFF;margin-top: 20px">LOGO</h1>
    </div>
<!--    <button style="-->
<!--      /*padding: 10px;*/-->
<!--      margin-top:20px;-->
<!--      margin-bottom: 10px;-->
<!--      margin-left: auto;-->
<!--      margin-right: 20px;-->
<!--      color: #ffffff;-->
<!--      padding: 2px;-->
<!--      height: 40px;-->
<!--      width: 160px;-->
<!--      border-radius: 20px;-->
<!--      display: block;-->
<!--      background-color: #625C5CFF;-->
<!--      border: none">LogOut</button>-->
</header>
<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Admin-Home-Add Student</div>
<!--<div><button-->
<!--        style="-->
<!--margin-top: 10px;-->
<!--float: right;-->
<!--margin-right: 70px;-->
<!--border-radius: 4px;-->
<!--border: none;-->
<!--background-color: #625C5CFF;-->
<!--padding: 10px;-->
<!--width: 80px;-->
<!--color: white">Add</button></div>-->
<div style="margin-top:2px;display: flex">
<?php

$con = new mysqli("localhost", "root", "mysql", "school");
echo "<table style='margin-top: 50px;border: 1px rgba(0,0,0,0.21);width: 560px;margin-left: auto;margin-right: auto'>";
echo "<tr>";
echo "<th  style='background-color: #bebebe;color:#000000FF;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'> name </th>";
echo "<th style='background-color: #bebebe;color:#000000FF;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'> phone </th>";
echo "<th style='background-color: #bebebe;color:#000000FF;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'>edit</th>";
echo "<th style='background-color: #bebebe;color:#000000FF;;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'>profile</th>";

echo "</tr>";
echo "<br>";
$q1 = "select * from students";
$result = $con->query($q1);
while ($row = $result->fetch_assoc()) {
    echo "<br>";
    echo "<tr>";
    echo "<td style='font-size: medium;padding: 20px;text-align: center'>" . $row['name'] . "</td>";
    echo "<td style='font-size: medium;padding: 20px;text-align: center'>" . $row['phone'] . "</td>";
    echo "<td><button style='font-size: 1rem;border-radius: 4px;color: white;margin-right: auto;margin-left: 20px; padding: 5px;width: 80px;background-color: #625c5c;border: none'><a style='text-decoration: none;color: white' href='edit_student.php?id=" . $row['id'] . "'>" . "Edit</a></button></td>";
    echo "<td><button style='font-size: 1rem;border-radius: 4px;color: white;margin-left: 30px; padding: 5px;width: 80px;background-color: #625c5c;border: none'><a style='text-decoration: none;color: white' href='profile_student.php?id=" . $row['id'] . "'>" . "profile</a></button></td>";

    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>
<form method='post' style='margin-left: 100px' >

    <br>

    <div >
        <button name="add" style="display: block;
margin-top: -50px;
float: right;
margin-right: 70px;
border-radius: 4px;
border: none;
background-color: #625C5CFF;
padding: 10px;
width: 80px;
color: white">Add</button>

    </div>
    <div>
        <button
                name="logout"
                style="
       /*padding: 10px;*/
      margin-top:-160px;
      margin-bottom: 10px;
      margin-left: auto;
      margin-right: 60px;
      color: #ffffff;
      padding: 2px;
      height: 40px;
      width: 160px;
      border-radius: 20px;
      display: block;
      background-color: #625C5CFF;
      border: none">LogOut</button>

    </div>

</form>
<?php
if(isset($_POST['add'])){
    Header("location:add_student.php");
}
else if(isset($_POST['logout'])){
    header ('location: \admin/login_home.php');
}?>