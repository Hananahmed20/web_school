<?php
if (isset($_POST["submit"])) {
    if ($_POST['submit'] == 'admin') {
        header("Location: loginAdmin.php");
    } else if ($_POST['submit'] == 'teacher') {
        header("Location: loginTeacher.php");
    } else if ($_POST['submit'] == 'student') {
        header("Location: loginStudent.php");
    }
}
?>


<html>

<head>
    <title>main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body style="margin: 0;
  min-height: 100%;
  flex-direction: column;
  background-color: rgb(243,241,238)";
      background = "login.jpeg"
>
<h2 style="color:#000000; font-weight:bold; margin-top:70px;margin-left: 600px">Login Pages</h2>

<div style="margin-top: 40px ;margin-left: 50px">
    <form method="post" style="display: flex;flex-direction: column;width: 200px;margin-right: auto;margin-left: 550px" >
        <button id="button" name="submit" value='admin' class="btn mb-2" style="color: #ffffff;font-weight:bold; background-color:#000000; margin-right: 20px;margin-top:15px">
            Admin</button>
        <br>

        <button id="button" name="submit" value='teacher' class="btn mb-2" style="color: #ffffff;font-weight:bold; background-color:#000000; margin-right: 20px;margin-top:15px">
            Teacher</button>
        <br>

        <button id="button" name="submit" value='student' class="btn mb-2" style="color: #ffffff;font-weight:bold; background-color:#000000; margin-right: 20px;margin-top:15px">
            Student</button>
        <br>
    </form>
</div>

</body>

</html>