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
<div style="margin-top: 30px;margin-left: 30px;font-size: 30px;color: #6c757d">Admin-Home-Edit Course</div>

<?php
$con = new mysqli("localhost","root","mysql","school");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM courses WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "<form method='post' style='margin-left: 100px;margin-top: 20px'>";
        echo "<label style='color:#625c5c;margin-top:30px;font-size: large'>Number:</label>";
        echo "<input name='id' type='text' value='{$row['ID']}' style='border: 1px solid #dad2d2;margin-left: 5px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'> "."<br><br>";
        echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Name</label>";
        echo "<input name='name' type='text' value='{$row['name']}' style='border: 1px solid #dad2d2;margin-left: 23px;padding-left: 10px;padding-top: 5px;padding-bottom: 5px;width: 240px'>"."<br><br>";
        echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Teacher</label>";
        echo "<input name='teacher' type='text' value='{$row['TeacherID']}'> "."<br><br>";
        if ($row['TeacherID']==1){
            echo "<select  name='teacher'  style='border: 1px solid white;color: #6c757d;margin-left: 12px;padding-left: 10px;padding-top: 5px;padding-bottom: 5px;width: 240px'>";
            echo "<option value='1' selected >Ahmed Ali </option>";
            echo "<option value='2'>John</option>";
            echo "<option value='3'>Sami</option>";
            echo "</select>";
        }elseif ($row['TeacherID']==2) {
            echo "<select  name='teacher'>";
            echo "<option value='1'  >Ahmed Ali </option>";
            echo "<option value='2' selected>John</option>";
            echo "<option value='3'>Sami</option>";
            echo "</select>";
        }else {
            echo "<select  name='teacher'  style='border: 1px solid white;color: #6c757d;margin-left: 12px;padding-left: 10px;padding-top: 5px;padding-bottom: 5px;width: 240px'>";
            echo "<option value='1'>Ahmed Ali </option>";
            echo "<option value='2'>John</option>";
            echo "<option value='3' selected>Sami</option>";
            echo "</select>";
        }
        echo "<br>";
        echo "<br>";
        echo "<button type='submit' name='update' style='margin-left: 150px;padding: 3px;width: 120px;color:#ffffff;background-color:#625C5CFF;border-radius: 6px; border: white'>update course</button>";
        echo "<button type='submit' name='back' style='margin-left: 20px;padding: 3px;width: 70px;color:#ffffff;background-color:#625C5CFF;border-radius: 6px; border: white'>Back</button>";

        echo "</form>";;
    } else {
        echo "No record found for the given ID.";
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Number = $_POST['id'];
    $name = $_POST['name'];
    $teacher = $_POST['teacher'];
    $sql = "update courses set name ='" . $_POST['name'] . "',TeacherID='" . $_POST['teacher']."' WHERE ID='$Number';";

//  $sql = "update courses set name='$name',TeacherID ='$teacher',WHERE ID='$Number';";
//    $sql = "UPDATE courses SET  name='$name' ,TeacherID ='$teacher',WHERE ID='$Number'";
    $result = mysqli_query($con, $sql);
//    $result = $con->query($sql);
    if ($result) {
        echo "Row updated successfully.";
        Header("location:courses.php");

    } else {
        echo "Error updating row: " . mysqli_error($con);
    }
}

if(isset($_POST['back'])){
    Header("location:courses.php");
}
?>