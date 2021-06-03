<?php
include '../connection.php';

if(isset($_POST['login'])){
            extract($_POST);
            $email = stripcslashes($email);  
            $password = stripcslashes($password);  
     		$email = mysqli_real_escape_string($conn, $email);
			$password = mysqli_real_escape_string($conn, $password);
            $sql = "SELECT * from `student_login` WHERE `email`='$email'";
            $query_run = mysqli_query($conn, $sql);
            if($row = mysqli_fetch_assoc($query_run)){
                    if($row['password'] == $password) {
                        session_start();
                        $_SESSION['roll_no'] = $row['roll_no'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        header("Location: student_dashboard.php");
                    }
                    else{
                        echo "<script>alert('WRONG PASSWORD');</script>";
                    }
            }
            else{
                echo "<script>alert('Use Right Email Address');</script>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <!--Bootstrap File-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/juquery_latest.js"></script>
    <!--CSS Files-->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!--Header-->
    <div class="row" id="header">
        <div class="col-md-5 m-auto block">
        <h1>Student Management System</h1>
        </div>
    </div>

    <!--Login form code Start here-->
    <section id="login_form" class="p-5">
        <div class="row">
            <div class="col-md-4 m-auto block">
            <center><u><h4>Student Login Page</h4></u></center>
                <form action="student_login.php" method="post">
                    <div class="form-group">
                        <label>Email Id : </label>
                        <input class="form-control" type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <label>Password : </label>
                        <input class="form-control" type="password" name="password" placeholder="Enter Your Password" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>