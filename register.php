<?php
include 'connection.php';

if(isset($_POST['register'])){
    $query = "insert into users
    values(null,'$_POST[fname]', '$_POST[lname]', '$_POST[email]', '$_POST[password]', '$_POST[class]')";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script>alert('Registration Successfully .... You may now login.')
        window.location.href = 'user_login.php';
        </script>";
    }
    else{
        echo "<script>alert('Registration Failed!......Please Try Again')
        window.location.href = 'register.php';
        </script>";
        
    }
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
    <link rel="stylesheet" href="css/style.css">
    
    <title>Online Notice Board System</title>
</head>
<body>
    <!--Header-->
    <div class="row" id="header">
        <div class="col-md-4 m-auto block">
            <h1>Online Notice Board</h1>
        </div>
    </div> 

    <!--Login form code Start here-->
    <section id="login_form" class="p-5">
        <div class="row">
            <div class="col-md-4 m-auto block">
                <center><h4>Registration Form</h4></center>
                <form action="" method="post">
                <div class="form-group">
                        <label>First Name : </label>
                        <input class="form-control" type="text" name="fname" placeholder="Enter Yuor First Name">
                    </div>
                    <div class="form-group">
                        <label>Last Name : </label>
                        <input class="form-control" type="text" name="lname" placeholder="Enter Yuor Last Name">
                    </div>
                    <div class="form-group">
                        <label>Email Id : </label>
                        <input class="form-control" type="email" name="email" placeholder="Enter Yuor Email">
                    </div>
                    <div class="form-group">
                        <label>Password : </label>
                        <input class="form-control" type="password" name="password" placeholder="Enter Yuor Password">
                    </div>
                    <div class="form-group">
                        <label>Select Your Class : </label>
                        <select class="form-control" name="class">
                            <option>-Select-</option>
                            <option>8th</option>
                            <option>9th</option>
                            <option>10th</option>
                            <option>11th</option>
                            <option>12th</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit" name="register">Register</button>
                </form>
                <a href="index.php">Click here to Login</a>
            </div>
        </div>
    </section>
</body>
</html>