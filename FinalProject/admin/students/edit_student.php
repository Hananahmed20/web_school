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
<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Admin-Home-Edit Student</div>
<?php

$con = new mysqli("localhost", "root", "mysql", "school");
if (isset($_GET['id'])) {
    $q = "select * from students where id=" . $_GET['id'];
    $result = $con->query($q);
    $row = $result->fetch_assoc();
    $n = $row['name'];
    $e = $row['email'];
    $ph = $row['phone'];
    $pa = $row['password'];
    $im = $row['image'];

    echo "<form method='post' style='margin-left: 200px;margin-top: 20px'>";
    echo "<label style='color:#625c5c;margin-top:30px;font-size: large'>Name: </label>";
    echo "<input name='name'  type='text' value='{$row['name']}'  style='border: 1px solid #dad2d2;margin-left: 40px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>"."<br><br>";
    echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Email: </label>";
    echo "<input name='email'  type='text' value='".$GLOBALS['e']."' style='border: 1px solid #dad2d2;margin-left: 43px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>"."<br><br>";
    echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Phone: </label>";
    echo "<input name='phone'  type='number' value='".$GLOBALS['ph']."' style='border: 1px solid #dad2d2;margin-left: 35px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>"."<br><br>";
    echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Password: </label>";
    echo "<input name='password'  type='text' value='".$GLOBALS['pa']."' style='border: 1px solid #dad2d2;margin-left: 10px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>"."<br><br>";
    echo "<label style='color:#625c5c;margin-top:5px;font-size: large'>Image: </label>";
    echo "<input name='image'  type='file' style='border: 1px solid #dad2d2;margin-left: 35px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>"."<br><br>";
    echo "<button type='submit' name='update' style='margin-left: 120px;padding: 3px;width: 120px;color:#ffffff;background-color:#625C5CFF;border-radius: 6px; border: white'>update Student</button>";
    echo "<button type='submit' name='back' style='margin-left: 20px;padding: 3px;width: 70px;color:#ffffff;background-color:#625C5CFF;border-radius: 6px; border: white'>Back</button>";
    echo "</form>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['image'] != null) {
        $GLOBALS['im'] = $_POST['image'];
    }
    $id =$_GET['id'];
    $update = "update students set name ='" . $_POST['name'] . "',email='" . $_POST['email'] . "',phone='" . $_POST['phone'] . "',password='" . $_POST['password'] . "',image='" . $GLOBALS['im'] ."' WHERE id='$id';";
    $result = $con->query($update);

    if ($result) {
        echo "Row updated successfully.";
        Header("location:student_home.php");

    } else {
        echo "Error updating row: " . mysqli_error($con);
    }

}
if (isset($_POST['back'])) {
    Header("location:student.php");
}
?>
</body>
</html>
