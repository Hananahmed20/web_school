
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
<header style="color: #ffffff;background-color: #a8b3c0; min-height: 80px;display: flex">
    <div >
        <h1 style="font-family: 'Book Antiqua';margin-left: 100px;color: #625C5CFF;margin-top: 20px">LOGO</h1>
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
<div style="margin-top: 30px;margin-left: 30px;font-size: 30px;color: #6c757d">Admin-Home-Courses</div>

<?php
$con = new mysqli("localhost","root","mysql","school");
if($con->connect_error){
    die("failed connection".$con->connect_error);
}else{
    if(isset($_POST['add'])) {

        $number = $_POST[id];
        $name = $_POST[name];
        $teachid = $_POST[teacher];

        $add = "insert into courses (ID,name, TeacherID) values ('$number','$name' ,'$teachid');";
        $crs = mysqli_query($con, $add);
        if($crs){
            header('location:courses.php');
        }else{
            echo "faild add";
        }

    }

}

echo "</h5>";
echo "<form method='post' style='margin-left: 100px' >";
echo "<label style='color:#625c5c;margin-top:30px;font-size: large'>Number: </label>";
echo "<input name='id'  type='text' style='border: 1px solid #dad2d2;margin-left: 5px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px' placeholder='Enter course number..'>" ."<br><br>";
echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Name: </label>";
echo "<input name='name'  type='text'  style='border: 1px solid #dad2d2;margin-left: 23px;padding-left: 10px;padding-top: 5px;padding-bottom: 5px;width: 240px' placeholder='Entet Course Name'>"."<br><br>";
echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Teacher: </label>";
echo "<select name='teacher' id ='teacher' style='border: 1px solid white;color: #6c757d;margin-left: 12px;padding-left: 10px;padding-top: 5px;padding-bottom: 5px;width: 240px'>";
echo "<option value='1' style='color: #6091CCFF'>Ahmed Ali </option>";
echo "<option value='2' style='color: #6091CCFF'>John</option>";
echo "<option value='3' style='color: #6091CCFF'>sami</option>";
echo "</select>";
echo"<br>";
echo"<br>";
echo "<button type='submit' name='add' style='margin-left: 250px;padding: 3px;width: 70px;color:#ffffff;background-color:#625C5CFF;border-radius: 6px; border: white'>Save</button>";
echo "</form>";
?>
</body>
</html>
