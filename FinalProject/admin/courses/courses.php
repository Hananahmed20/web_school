
<html>
<head>
    <link rel="stylesheet" href="assets/css/templatemo-seo-dream.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body style="margin: 0;
  min-height: 100%;
  flex-direction: column;
  background-color: rgb(243,241,238)">

<header style="color: #ffffff;background-color: #bebebe; min-height: 80px;display: flex">
    <div >
        <h1 style="font-family: monospace;margin-left: 50px;color: #625C5CFF;margin-top: 20px">LOGO</h1>
    </div>

</header>
<div style="margin-top: 30px;margin-left: 30px;font-size: 30px;color: #6c757d">Admin-Home-Courses</div>


<div style="margin-top:2px;display: flex">
    <?php
    $con = new mysqli("localhost","root","mysql","school");

    echo "<table border='1' style='margin-top: 50px;border: 1px rgba(0,0,0,0.21);width: 560px;margin-left: auto;margin-right: auto'>";

    echo "<tr>";
    echo "<th bgcolor=#FFFFFF style='background-color: #bebebe;color:#000000FF;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'> number </th>";
    echo "<th bgcolor=#FFFFFF style='background-color: #bebebe;color: #000000FF;border:#625c5c;padding: 20px;font-family: Arial'> name </th>";
    echo "<th bgcolor=#FFFFFF style='background-color: #bebebe;color: #000f;border:#625c5c;padding: 20px;font-family: Arial'>edit</th>";

    echo "</tr>";
    echo "<br>";
    $q1 = "select * from courses";
    $result = $con->query($q1);
    while ($courses = $result->fetch_assoc()){
        echo "<br>";
        echo "<tr>";
        echo "<td style='font-size: medium;padding: 20px;text-align: center'>".$courses['ID']."</td>";
        echo "<td style='font-size: medium;padding: 20px;text-align: center'>".$courses['name']."</td>";
        echo "<td><button style='text-decoration: none;font-size: 1rem;border-radius: 4px;color: white;margin:  10px;margin-left: 20px; padding: 5px;width: 80px;background-color: #625c5c;border: none'><a style='text-decoration: white;color: white' href='edit_course.php?id=" .$courses['ID']."'>"."Edit</a></button></td>";
        echo "</tr>";

    }
    echo "</table>";
    if(isset($_POST['add'])){
        Header("location:add_course.php");
    }
    else if(isset($_POST['logout'])){
        session_start();
        session_destroy();
//        setcookie("email",$email,time()-2);
//        setcookie("password",$password,time()-2);
        header ('location: \admin/login_home.php');    }
    ?>

</div>

</body>
</html>

<form class="text-center"  method="post">


    <button id="button" name="submit" value='logOut' class="btn mb-2" style=" margin-top: 100px;
                margin-left: 200px;
float: right;
margin-right: 70px;
border-radius: 4px;
border: none;
background-color: #625C5CFF;
padding: 10px;
width: 80px;
color: white;">
        Log Out </button>

<!--    <button-->
<!--            name="submit";-->
<!--            value="add";-->
<!--            style="display: block;-->
<!--margin-top: 10px;-->
<!--margin-left: 200px;-->
<!--float: right;-->
<!--margin-right: 70px;-->
<!--border-radius: 4px;-->
<!--border: none;-->
<!--background-color: #625C5CFF;-->
<!--padding: 10px;-->
<!--width: 80px;-->
<!--color: white">Add</button>-->
</form>
<?php
if (isset($_POST["submit"])) {

    if ($_POST['submit']=='logOut') {
//        session_start();
        session_destroy();
//        setcookie("email",$email,time()-2);
//        setcookie("password",$password,time()-2);
        header ('location: login_home.php');
    }elseif ($_POST['submit']=='add'){
        header ('location: add_course.php');
}}
?>