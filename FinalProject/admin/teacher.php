<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body style="margin: 0;
  min-height: 100%;
  /*display: block;*/
  flex-direction: column;
  background-color: rgb(243,241,238)">
<header style="color: #ffffff;background-color: #bebebe; min-height: 80px;display: flex">
    <div >
        <h1 style="font-family: monospace;margin-left: 50px;color: #625c5c;margin-top: 20px">LOGO</h1>
    </div>
    <img src="$rowt['image]" style="background-color: #625c5c;height: 45px;width: 50px;margin-top: 15px;margin-left: 995px;padding: 5px;margin-right: 10px;">
<!--     <button style="-->
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
<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Teacher-Home</div>






<?php
require('connection.php');
$con = new mysqli("localhost", "root", "mysql", "school");

session_start();
if(isset($_POST['signin']) or (isset($_COOKIE['email'])and isset($_COOKIE['password']))){
    if(isset($_COOKIE['email']) and isset($_COOKIE['password'])){
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    $signin=(isset($_POST['signin'])) ? true : false;
    $sql2 = "select email , password   from teachers where email='$email' and password='$password'";
    $result2 = mysqli_query($con,$sql2);
    if ($row2 = mysqli_fetch_array($result2)) {
        mysqli_query($con,"UPDATE teachers SET date = now()");
        $_SESSION['teacher']['email'] = $email;
        $_SESSION['teacher']['password'] = $password;
        if($signin){
            setcookie("email",$email,time()+3600);
            setcookie("password",$password,time()+3600);
        }
    }else{
        header('location: loginTeacher.php?error=auth');
        exit();
    }
}
if ($_SESSION['teacher']){

}else{
    header('location: loginTeacher.php');
}

$sqlt = "select * from teachers where email = '$email' and password = '$password' ";
$resultt = mysqli_query($con,$sqlt);
$rowt = $resultt->fetch_assoc();



?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <?php
    echo "<h4 style=' margin-top:-130px;
      margin-left: 520px;'>  " . $rowt["name"]. "</h4>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    //        echo"welcome teacher ".$rowt["name"];

    $q = "select * from courses where TeacherID = ".$rowt['id'] ;
    $result = $con->query($q);
    while ( $tea = $result->fetch_assoc()) {

         echo '<a  href="teacher_add_grade.php?value=' . urlencode($tea['ID']) . '" style=" text-decoration: #6c757d;color: #1a1e21"><div  class="container">' . $tea['ID'] ."<br>". $tea['name'].'</div></a>';
        echo "<br>";

     }

    ?>
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
margin-top: 10px;
float: right;
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
        session_destroy();
        setcookie("email",$email,time()-2);
        setcookie("password",$password,time()-2);
        header ('location: login_home.php');
    }elseif ($_POST['submit']=='add'){
        header ('location: teacher_add_grade.php');

    }
}
?>

</body>
</html>

<style>
    .container {
        width: 150px;
        height: 150px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 10px;
    }
</style>