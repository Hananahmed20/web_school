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
    <img src="$rowt['image]" style="background-color: #625c5c;height: 45px;width: 50px;margin-top: 15px;margin-left:885px;padding: 5px;margin-right: 10px;">


</header>
<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Home_Student</div>



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
    $sql2 = "select email , password   from students where email='$email' and password='$password'";
    $result2 = mysqli_query($con,$sql2);
    if ($row2 = mysqli_fetch_array($result2)) {
        mysqli_query($con,"UPDATE students SET date = now()");
        $_SESSION['student']['email'] = $email;
        $_SESSION['student']['password'] = $password;
        if($signin){
            setcookie("email",$email,time()+3600);
            setcookie("password",$password,time()+3600);
        }
    }else{
        header('location: loginStudent.php?error=auth');
        exit();
    }
}
if ($_SESSION['student']){

}else{
    header('location: loginStudent.php');
}

$sqlt = "select * from students where email = '$email' and password = '$password' ";
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

<?php
echo "<h4 style=' margin-top:-130px;
      margin-left: 1100px;
      margin-right: auto;
      color: #625c5c'>  " . $rowt["name"]. "</h4>";

if (isset($_POST["submit"])) {

    if ($_POST['submit']=='logOut') {
//        session_start();
        session_destroy();
        setcookie("email",$email,time()-2);
        setcookie("password",$password,time()-2);
        header ('location: login_home.php');
    }elseif ($_POST['submit']=='add'){
//        header ('location: teacher_add_grade.php');

    }
}
?>
<form class="text-center"  method="post" style="width: 220px;margin-top: 30px;margin-left: 900px;margin-right: auto;display: flex;flex-direction: row">
    <div>
        <button id="button" name="submit" value='View_grade' class="btn mb-2" style="color:rgba(0,0,0,0.21);font-weight:bold;background-color:#bebebe; margin-top:20px;margin-right: 20px">
            View Grade</button>
    </div><br>
    <button id="button" name="submit" value='logOut' class="btn mb-2" style="color:rgba(0,0,0,0.21);font-weight:bold;background-color:#bebebe;margin-top:20px">
        Log Out </button>
</form>
</body>
</html>


<?php
if (isset($_POST["submit"])) {
    if ($_POST['submit']=='View_grade') {
//        $sql= "select grades.StudentID, students.name, grades.CourseID, grades.Grade
//    from grades INNER JOIN students ON grades.StudentID=students.id
//    where grades.StudentID=students.id";
        $sql = "select * from grades INNER JOIN courses ON grades.CourseID=courses.ID  
         where StudentID in (select id from students where email = '$email' and password = '$password')   
                
                ";
        $result = mysqli_query($con,$sql);
        echo "<div class='container'>
            <table style='margin-left:420px; margin-top:40px; background-color:#c3fae6;width:25%;' >
                    <tr>
                    <th>Course Number</th>
                      <th>Course Name</th>
                    <th>Grade</th>
                    </tr>";
//        $rowSg = mysqli_fetch_array($resultSg);
        while( $rowSg = mysqli_fetch_array($result)) {
            echo "<tr>
            <td>".$rowSg["CourseID"]."</td>
            <td>".$rowSg["name"]."</td>
            <td>".$rowSg["Grade"]."</td>
            </tr>";
        }
        echo "</table>
</div>
<br>";
    }
    else if ($_POST['submit']=='logOut') {
        session_start();
        session_destroy();
        setcookie("email",$email,time()-2);
        setcookie("password",$password,time()-2);
        header ('location: login_home.php');
    }

}