<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body style="margin: 0;
  min-height: 100%;
  /*display: block;*/
  flex-direction: column;
  background-color: rgb(243,241,238)">
<header style="color: #ffffff;background-color: #a8b3c0; min-height: 80px;display: flex">
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
<div style="margin-top: 30px;margin-left: 100px;font-size: 30px;color: #6c757d">Admin-Home-Add Student</div>
<?php
$con = new mysqli("localhost","root","mysql","school");
if($con->connect_error){
    die("failed connection".$con->connect_error);
}else{
    if(isset($_POST['add'])) {

        $name =$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $password =$_POST["password"];
        $image=$_POST["image"];

//        $query = "Insert Into students values ('" . $_POST["name"] . ",'" . $_POST['phone'] . "','" . $_POST['password'] . "','" . $_POST['image'] . "')";

        $add = "insert into students (name,email, password,phone,image) values ('$name','$email','$password','$phone' ,'$image');";
        $crs = mysqli_query($con, $add);
        if($crs){

            header('location:student.php');
        }else{
            echo "faild add";
        }

    }}

echo "<form method='post' style='margin-left: 200px;margin-top: 20px'>";
echo "<label style='color:#625c5c;margin-top:30px;font-size: large'>Name: </label>";
echo "<input name='name'  type='text' style='border: 1px solid #dad2d2;margin-left: 40px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px' placeholder='Enter student name'>"."<br><br>";
echo "<label style='color:#625c5c;margin-top:10px;font-size: large'>Email: </label>";
echo "<input name='email'  type='email' style='border: 1px solid #dad2d2;margin-left: 43px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px' placeholder='Enter student email'>"."<br><br>";
echo "<label style='color:#625c5c;margin-top:10px;font-size: large'>Phone: </label>";
echo "<input name='phone'  type='number' style='border: 1px solid #dad2d2;margin-left: 35px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px' placeholder='Enter student phone'>"."<br><br>";
echo "<label style='color:#625c5c;margin-top:10px;font-size: large'>Password: </label>";
echo "<input name='password'  type='text' style='border: 1px solid #dad2d2;margin-left: 10px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px' placeholder='Enter student password'>"."<br><br>";
echo "<label style='color:#625c5c;margin-top:10px;font-size: large'>Image: </label>";
echo "<input name='image'  type='file' style='border: 1px solid #dad2d2;margin-left: 35px;padding-left: 10px;padding-top: 3px;padding-bottom: 3px;width: 240px'>"."<br><br>";
echo "<button type='submit' name='add' style='margin-left: 260px;padding: 3px;width: 70px;color:#ffffff;background-color:#625C5CFF;border-radius: 6px; border: white'>Save</button>";
echo "</form>";
?>
</body>
</html>