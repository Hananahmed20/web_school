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
<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Admin-Home-Add Grade</div>

<?php
$con = new mysqli("localhost","root","mysql","school");

if($con->connect_error){
    die("failed connection".$con->connect_error);
}else {
    if (isset($_POST['add'])) {
        $value= $_GET['value'];
        $number = $_POST['student'];
        $grade = $_POST['grade'];

        $add = "insert into grades (StudentID,CourseID,Grade) values ('$number','$value','$grade' );";
        $crs = mysqli_query($con, $add);
        if ($crs) {
            header('location:teacher.php');
        } else {
            echo "faild add";
        }
    }




    echo "<form method='post' style='margin-left: 200px;margin-top: 20px'>";
    echo "<label style='color:#625c5c;margin-top:30px;font-size: large'>Student: </label>";
    echo "<select name='student' id ='student' style='border: 1px solid #dad2d2;margin-left: 10px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>";
    echo "<option value='1' style='color: #6091CCFF'>Yamen </option>";
    echo "<option value='2' style='color: #6091CCFF'>Sara</option>";
    echo "<option value='3' style='color: #6091CCFF'>Hala</option>";
    echo "</select>";
    echo "<br>";
    echo "<label style='color:#625c5c;margin-top:10px;font-size: large'>Grade: </label>";
    echo "<input name='grade'  type='text' style='border: 1px solid #dad2d2;margin-left: 23px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>" . "<br><br>";
    echo "<button type='submit' name='add' style='margin-left: 250px;padding: 3px;width: 70px;color:#ffffff;background-color:#625C5CFF;border-radius: 6px; border: white'>Save</button>";
    echo "</form>";

}