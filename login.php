<?php
include 'connection.php';
if(isset($_POST['student_login'])){
    header("Location:student/student_login.php");
}
if(isset($_POST['admin_login'])){
    header("Location:admin/admin_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap File-->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script src="bootstrap-4.5.3-dist/js/bootstrap.min.js" charset="utf-8"></script>
    <!--CSS Files-->
    <link rel="stylesheet" href="css/style.css"/>
    <style>
    body{
        background : url('images/background.jpg') center center/cover;
    }
    </style>    
    <title>Student Management System</title>
</head>
<body>
    <!--Header-->
    <div class="row" id="header">
        <div class="col-md-5 m-auto block">
            <h1>Student Management System</h1>
        </div>
    </div>
    <div class="row">
        <div class="m-auto block p-5">
            <form action="" method="POST">
                <button class="btn btn-secondary m-2" name="student_login">Student Login</button>
                <button class="btn btn-secondary m-2" name="admin_login">Admin Login</button>
            </form>
        </div>
    </div>
</body>
</html>