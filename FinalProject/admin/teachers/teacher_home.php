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
<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Admin-Home-teachers</div>

<div style="margin-top:2px;display: flex">


</div>

<?php
//select all employee
$con = new mysqli("localhost","root","mysql","school");
if($con->connect_error){
    die("failed connection".$con->connect_error);
}else {
    echo "<table style='margin-top: 50px;border: 1px rgba(0,0,0,0.21);width: 560px;margin-left: auto;margin-right: auto'>";
    echo "<tr>";
    echo "<th style='background-color: #bebebe;color:#000000FF;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'>Name</th>";
    echo "<th style='background-color: #bebebe;color:#000000FF;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'>phone</th>";
    echo "<th style='background-color: #bebebe;color:#000000FF;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'>edit</th>";
    echo "<th style='background-color: #bebebe;color:#000000FF;text-align: center;border: #625c5c;padding: 20px;font-family:Arial;padding-right: 40px'>profile</th>";
    echo "</tr>";

    $q1 = "select * from teachers";
    $result = $con->query($q1);
    while ($tea = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='font-size: medium;padding: 20px;text-align: center'>" . $tea['name'] . "</td>";
        echo "<td style='font-size: medium;padding: 20px;text-align: center'>" . $tea['phone'] . "</td>";
        echo "<td><button style='font-size: 1rem;border-radius: 4px;color: white;margin-right: auto;margin-left: 20px; padding: 5px;width: 80px;background-color: #625c5c;border: none'><a style='text-decoration: none;color: white' href='edit_teacher.php?id=" . $tea['id'] . "'>" . "Edit</a></button></td>";
        echo "<td><button style='font-size: 1rem;border-radius: 4px;color: white;margin-left: 30px; padding: 5px;width: 80px;background-color: #625c5c;border: none'><a style='text-decoration: none;color: white' href='profile_teacher.php?id=" . $tea['id'] . "'>" . "profile</a></button></td>";

        echo "</tr>";
    }
    echo "</table>";
//    if(isset($_POST['add'])){
//        header("location:add_teacher.php");
//    }
//    else if(isset($_POST['logout'])){
//        session_start();
//        session_destroy();
////        setcookie("email",$email,time()-2);
////        setcookie("password",$password,time()-2);
//        header ('location: login_home.php');
//    }
}?>
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

    <button
            name="submit";
            value="add";
            style="display: block;
            margin-top: 100px;
margin-left: 1200px;
 margin-right: 70px;
border-radius: 4px;
border: none;
background-color: #625C5CFF;
padding: 10px;
width: 80px;
color: white">Add</button>
</form>
</div>
<?php
if (isset($_POST["submit"])) {

    if ($_POST['submit']=='logOut') {
//        session_start();
//        session_destroy();
         header ('location: login_home.php');
    }elseif ($_POST['submit']=='add'){
        header ('location: add_teacher.php');

    }
}
?>
</body>
</html>

<!--<form method='post' style='margin-left: 100px' >-->
<!---->
<!--    <div >-->
<!--        <button name="add" style="display: block;-->
<!--margin-top: 100px;-->
<!--float: right;-->
<!--margin-right: 70px;-->
<!--border-radius: 4px;-->
<!--border: none;-->
<!--background-color: #625C5CFF;-->
<!--padding: 10px;-->
<!--width: 80px;-->
<!--color: white">Add</button>-->
<!---->
<!--    </div>-->
<!--    <div>-->
<!--        <button-->
<!--                name="logout"-->
<!--                style="-->
<!--       /*padding: 10px;*/-->
<!--      margin-top:-430px;-->
<!--      margin-bottom: 10px;-->
<!--      margin-left: auto;-->
<!--      margin-right: 40px;-->
<!--      color: #ffffff;-->
<!--      padding: 2px;-->
<!--      height: 40px;-->
<!--      width: 160px;-->
<!--      border-radius: 20px;-->
<!--      display: block;-->
<!--      background-color: #625C5CFF;-->
<!--      border: none">LogOut</button>-->
<!---->
<!--    </div>-->
<!---->
<!--</form>-->