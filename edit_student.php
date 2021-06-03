<?php
session_start();
include "connection.php";
$roll_no = $_POST['roll_no'];
$name = $_POST['name'];
$father_name = $_POST['father_name'];
$class = $_POST['class'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];
$remark = $_POST['remark'];
$query = "UPDATE `student_login` SET `name`='$name',`father_name`='$father_name',`class`='$class', `mobile`='$mobile', `email`='$email', `password`='$password', `remark`='$remark' WHERE `roll_no` = '$roll_no'";
$query_run = mysqli_query($conn, $query);
$emailx = $_SESSION['email'];
echo "<script>alert('Details Updated Successfully');</script>";
$queryx = "SELECT * from `student_login` where `email` = '$emailx'";
$query_runx = mysqli_query($conn, $queryx);
if($rowx = mysqli_fetch_assoc($query_runx)){
        echo "<script> window.location.href = 'student/student_dashboard.php' </script>";   
}
else{
    echo "<script> window.location.href = 'admin/admin_dashboard.php' </script>";
}