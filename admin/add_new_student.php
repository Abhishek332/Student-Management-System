<?php
include "../connection.php";
session_start();
if(!isset($_SESSION['email'])){
    header("Location: admin_login.php");
    exit;
}
$roll_no = $_POST['roll_no'];
$name = $_POST['name'];
$father_name = $_POST['father_name'];
$class = $_POST['class'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];
$remark = $_POST['remark'];
$query = "INSERT INTO `student_login`(`name`,`father_name`,`class`, `roll_no`, `mobile`, `email`, `password`, `remark`) VALUES('$name', '$father_name', '$class', '$roll_no', '$mobile', '$email', '$password', '$remark') ";
$query_run = mysqli_query($conn, $query);
?>
<script>
    alert('Details Inserted Successfully');
    window.location.href = "admin_dashboard.php";
</script>