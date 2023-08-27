<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style='margin: 0;
  min-height: 100%;
  /*display: block;*/
  flex-direction: column;
  background-color: #F3F1EEFF'>
<header style='color: #ffffff;background-color: #bebebe; min-height: 80px;display: flex'>
    <div >
        <h1 style="font-family: monospace;margin-left: 50px;color: #625C5CFF;margin-top: 20px">LOGO</h1>
    </div>
    <button style="
      /*padding: 10px;*/
      margin-top:20px;
      margin-bottom: 10px;
      margin-left: auto;
      margin-right: 20px;
      color: #ffffff;
      padding: 2px;
      height: 40px;
      width: 160px;
      border-radius: 20px;
      display: block;
      background-color: #625C5CFF;
      border: none">LogOut</button>
</header>




<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Admin-Home-Teacher Profile</div>
<div style="display: flex;flex-direction: row ;margin-left: 150px;margin-top: 30px">
    <img src="" style="height: 200px;width: 150px" >
    <!--    <img src="" style="height: 200px;width: 80px">-->

    <div style="display: flex;flex-direction: column">
        <p style="font-size: 20px;color: #6c757d;margin-left: 15px;;display:flex;flex-direction: row">Name:<?php
            $con = new mysqli("localhost", "root", "mysql", "school");

            if (isset($_GET['id'])) {
                $q = "select * from teachers where id=" . $_GET['id'];
                $result = $con->query($q);
                while ($tea = $result->fetch_assoc()) {
                    echo "<p style='font-size: 20px;color: #6c757d;margin-left: 15px'>" .$tea['name'] .  "</p>";

                }
            }?></p>
        <p style="font-size: 20px;color: #6c757d;margin-left: 15px">Email: <?php
            $con = new mysqli("localhost", "root", "mysql", "school");

            if (isset($_GET['id'])) {
                $q = "select * from teachers where id=" . $_GET['id'];
                $result = $con->query($q);
                while ($tea = $result->fetch_assoc()) {
                    echo "<p style='font-size: 20px;color: #6c757d;margin-left: 15px'>" .$tea['email'] .  "</p>";

                }
            }?></p>
        <p style="font-size: 20px;color: #6c757d;margin-left: 15px">phone: <?php
            $con = new mysqli("localhost", "root", "mysql", "school");

            if (isset($_GET['id'])) {
                $q = "select * from teachers where id=" . $_GET['id'];
                $result = $con->query($q);
                while ($tea = $result->fetch_assoc()) {
                    echo "<p style='font-size: 20px;color: #6c757d;margin-left: 15px'>" .$tea['phone'] .  "</p>";

                }
            }?></p>
        <p style="font-size: 20px;color: #6c757d;margin-left: 15px">password: <?php
            $con = new mysqli("localhost", "root", "mysql", "school");

            if (isset($_GET['id'])) {
                $q = "select * from teachers where id=" . $_GET['id'];
                $result = $con->query($q);
                while ($tea = $result->fetch_assoc()) {
                    echo "<p style='font-size: 20px;color: #6c757d;margin-left: 15px'>" .$tea['password'] .  "</p>";

                }
            }?></p>

    </div>
</div>
</body>
</html>





<?php
//$con = new mysqli("localhost", "root", "mysql", "school");
//if (isset($_GET['id'])) {
//
//    echo "<table>";
//    echo "<tr>";
//    echo " <th>Name</th>";
//    echo "<th>Email</th>";
//    echo "<th>Phone</th>";
//    echo "<th>password</th>";
//    echo "</tr>";
//
//
//    $q = "select * from teachers where id=" . $_GET['id'];
//    $result = $con->query($q);
//    while ($tea = $result->fetch_assoc()) {
//        echo "<tr>";
//        echo "<td>" . $tea['name'] . "</td>";
//        echo "<td>" . $tea['email'] . "</td>";
//        echo "<td>" . $tea['phone'] . "</td>";
//        echo "<td>" . $tea['password'] . "</td>";
//        echo "<td>" . $tea['image'] . "</td>";
//        echo "</tr>";
//    }
//    echo "</table>";
//}