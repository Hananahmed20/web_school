<?php
$con = mysqli_connect("localhost","root","mysql","school");
if($con===false){
    die("Error connection:" .mysqli_connect_error());
}
// echo "created successfully";

?>