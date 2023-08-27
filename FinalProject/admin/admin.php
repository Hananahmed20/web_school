

        <?php
        require('connection.php');
        $con = new mysqli("localhost","root","mysql","school");

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
            $sql2 = "select email , password , name  from admin where email='$email' and password='$password'";
            $result2 = mysqli_query($con,$sql2);
            if ($row2 = mysqli_fetch_array($result2)) {
                if($email=="a@gmail.com" && $password == '123456'){
                    mysqli_query($con,"UPDATE admin SET date = now()");
                    $_SESSION['admin']['email'] = $email;
                    $_SESSION['admin']['password'] = $password;
                    $_SESSION['admin']['name'] = $row2['name'];
                    if($signin){
                        setcookie("email",$email,time()+3600);
                        setcookie("password",$password,time()+3600);
                    }
                }else{
                    header('location: loginAdmin.php?error=auth');
                    exit();
                }
            }
        }
        if ($_SESSION['admin']){

        }else{
            header('location: loginAdmin.php');
        }

        require('connection.php');
        $sqlA = "select * from admin where email = '$email' and password = '$password' ";
        $resultA = mysqli_query($con,$sqlA);
        $rowA = $resultA->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        </head>

        <body>
        <header style="color: #ffffff;background-color: #bebebe; min-height: 80px;display: flex">
            <div >
                <h1 style="font-family: monospace;margin-left: 50px;color: #625C5CFF;margin-top: 20px">LOGO</h1>
            </div>
            <button style="
      /padding: 10px;/
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
        <div style="margin-top: 30px;margin-left: 60px;font-size: 30px;color: #6c757d">Admin-Home</div>

        <div class="text-center" >
            <!--    <table style="width:100%" >-->
            <!--    <h1 style="margin-top:40px; color:#0d023d; ">--><?php //echo "Welcome ".$rowA["email"]?><!--</h1>-->
            <!--    <h4 style="margin-top:25px; color:blue;">Last time</h4>-->
            <!--        <p style="margin-top:15px;">--><?php //echo "". $_SESSION['admin']['name'];?><!--</p>-->
            <!--    </table>-->

            <form class="container" method="post" style="display: flex;flex-direction: row;margin-left: 450px">

                <div >
                    <button id="button" name="submit" value='Teachers' class="btn mb-2 " style="margin-top:20px;color:#000000;background-color:#bebebe;margin-right: 40px">
                        Teachers</button>
                </div><br>
                <div>
                    <button id="button" name="submit" value='Students' class="btn mb-2" style="margin-top:20px;color:#000000;background-color:#bebebe;margin-right: 40px">
                        Students</button>
                </div><br>
                <div>
                    <button id="button" name="submit" value='Courses' class="btn mb-2" style="margin-top:20px;color:#000000;background-color:#bebebe">
                        Courses</button>
                </div><br>
                        <div>
                            <button id="button" name="submit" value='logOut' class="btn mb-2"style="margin-left: 350px;color:white;background-color:#625c5c;">
                                Log Out </button>
                        </div>
            </form>
        </div>
        <h1 style="margin-top:40px; color:#0d023d; "></h1>
        <h4 style="margin-top:25px;margin-left: 80px ;color:#6c757d;font-size: 25px">Excellent Student</h4>

        <?php
        echo "<table border='1' style='font-size: x-large;margin-top: 20px;margin-left: 170px;width: 300px'>";
        echo "<tr>";
        echo "<th bgcolor=#FFFFFF style='background-color: #BEBEBEFF;text-align: center;font-family: Calibri'>Student Name </th>";
        echo "</tr>";
        $q1= "select grades.StudentID, students.name, grades.CourseID, grades.Grade 
    from grades INNER JOIN students ON grades.StudentID=students.id 
    where grade='A+'";
        $result = $con->query($q1);
        while ($row = $result->fetch_assoc()) {
            echo "<tr style='text-align: center'>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        if (isset($_POST["submit"])) {
            if ($_POST['submit']=='Teachers') {
                header ('location: teachers/teacher_home.php');
            }elseif ($_POST['submit']=='Courses'){
                header ('location: courses/courses.php');
            }
            elseif ($_POST['submit']=='Students'){
                header ('location: students/student_home.php');
            }



            else if ($_POST['submit']=='logOut') {
                session_start();
                session_destroy();
                setcookie("email",$email,time()-2);
                setcookie("password",$password,time()-2);
                header ('location: login_home.php');
            }
        }


?>
</body>
</html>