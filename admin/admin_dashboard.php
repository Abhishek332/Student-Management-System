<?php
include '../connection.php';
session_start();
if(!isset($_SESSION['email'])){
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap File-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/juquery_latest.js"></script>
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Langar&display=swap" rel="stylesheet">
    <style>
    #left_side{
        /* border : 2px solid black;*/
        background : whitesmoke;
    }
    #left_side .btn{
        width : 100%;
    }
        #right_side{
            background-color : silver;
         }
        
        #box{
            margin-bottom : 10px;
            border-radius : 10px;
            background : url('../images/background.jpg') center center/cover;
        }

        #logout a{
            text-decoration : none;
            color : white;
        }

        .theading{
            font-family: 'Langar', cursive;
            color : yellow;
            text-shadow : 4px 3px black;
        }

        .table{
            background : white;
            font-size : 1vw;
            
        }

        .table thead{
            background : #6C757D;
            color : white;
        }
    </style>
</head>
<body>
    <section id="header" class="p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center m-auto">
                    <h1>Student Management System</h1>
                    <h4>Admin Email : <?php echo $_SESSION['email']; ?></h4>
                    <h4>Admin Name : <?php echo $_SESSION['name']; ?></h4>
                    <a href="../logout.php"><button id="logout" name="logout" class="btn btn-success px-5 m-1">Logout</button></a>
                </div>
            </div>
        </div>
    </section>

    <section id="center-section">
    <div class="container-fluid m-2">
        <div class="row">
            <div id="left_side" class="col-md-2 p-3">
                <form action="" method="POST">
                        <button class="btn btn-secondary my-1" name="show_students">Show Students</button>
                        <button class="btn btn-secondary my-1" name="search_student">Search Student</button>
                        <button class="btn btn-secondary my-1" name="edit_student">Edit Student</button>
                        <button class="btn btn-secondary my-1" name="add_student">Add New Student</button>
                        <button class="btn btn-secondary my-1" name="delete_student">Delete Student</button>
                        <button class="btn btn-secondary my-1" name="show_teachers">Show Teachers</button>
                </form>
            </div>

            <div id="right_side" class="col-md-10 col-12">
                <span id="top_span"><marquee behavior="" direction="" class="m-2">This portal is open till 30 December 2020 ....... Please edit your information if wrong.</marquee></span>
                <div id="box" class="p-md-5 p-4">
                    <!--====================================================================================-->
                    <!--                                  SHOW Students SECTION                                      -->
                    <!--====================================================================================-->
                    <?php
                        if(isset($_POST['show_students'])){
                            include '../connection.php';
                    ?>
                        <h1 class="text-center theading">STUDENTS DETAIL</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Roll No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Father Name</th>
                                <th scope="col">class</th>
                                <th scope="col">Mobile No.</th>
                                <th scope="col">Email Id</th>
                                <th scope="col">Password</th>
                                <th scope="col">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                            $query = "SELECT * FROM `student_login`";
                            $query_run = mysqli_query($conn, $query);
                            $s_no = 0;
                            while($row = mysqli_fetch_assoc($query_run)){
                            $s_no++;
                    ?>
                            <tr>
                                <th scope="row"><?php echo $s_no;?></th>
                                <td><?php echo $row['roll_no'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['father_name'];?></td>
                                <td><?php echo $row['class'];?></td>
                                <td><?php echo $row['mobile'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['password'];?></td>
                                <td><?php echo $row['remark'];?></td>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                              </tbody>
                        </table>
                    <!--====================================================================================-->

                    <!--====================================================================================-->
                    <!--                                  SEARCH STUDENT SECTION                                    -->
                    <!--====================================================================================-->
                    <?php
                        if(isset($_POST['search_student'])){
                    ?>
                    <form action="" method="POST" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Enter Roll No." aria-label="Search" name="roll_no">
                        <button class="btn btn-success" type="submit" name="search_by_roll_no_for_search">Search</button>
                    </form>
                    <?php
                        }
                        if(isset($_POST['search_by_roll_no_for_search'])){
                            $roll_no = $_POST['roll_no'];
                            $query = "SELECT * FROM `student_login` WHERE `roll_no` = '$roll_no'";
                            $query_run = mysqli_query($conn, $query);
                            if($row=mysqli_fetch_assoc($query_run)){
                    ?>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Roll No.</b></span>
                                    <input type="number" class="form-control" value="<?php echo $row['roll_no']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Name</b></span>
                                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Father Name</b></span>
                                    <input type="text" class="form-control" value="<?php echo $row['father_name']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Class</b></span>
                                    <input type="text" class="form-control" value="<?php echo $row['class']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Contact No.</b></span>
                                    <input type="text" class="form-control" value="<?php echo $row['mobile']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Email</b></span>
                                    <input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Password</b></span>
                                    <input type="text" class="form-control" value="<?php echo $row['password']; ?>" disabled>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><b>Remark</b></span>
                                    <textarea class="form-control" disabled><?php echo $row['remark']; ?></textarea>
                                </div>
                    <?php
                            }
                        }
                    ?>
                    <!--====================================================================================-->

                    <!--====================================================================================-->
                    <!--                                  EDIT STUDENT SECTION                                      -->
                    <!--====================================================================================-->
                    <?php
                        if(isset($_POST['edit_student'])){
                    ?>
                    <form action="" method="POST" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Enter Roll No." aria-label="Search" name="roll_no">
                        <button class="btn btn-success" type="submit" name="search_by_roll_no_for_edit">Search</button>
                    </form>
                    <?php
                        }
                        if(isset($_POST['search_by_roll_no_for_edit'])){
                            $roll_no = $_POST['roll_no'];
                            $query = "SELECT * FROM `student_login` WHERE `roll_no` = '$roll_no'";
                            $query_run = mysqli_query($conn, $query);
                            if($row=mysqli_fetch_assoc($query_run)){
                    ?>
                                <form action="../edit_student.php" method="POST">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Roll No.</b></span>
                                    <input type="number" class="form-control" name="roll_no" value="<?php echo $row['roll_no']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Name</b></span>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Father Name</b></span>
                                    <input type="text" class="form-control" name="father_name" value="<?php echo $row['father_name']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Class</b></span>
                                    <input type="text" class="form-control" name="class" value="<?php echo $row['class']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Contact No.</b></span>
                                    <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Email</b></span>
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Password</b></span>
                                    <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><b>Remark</b></span>
                                    <textarea class="form-control" name="remark"><?php echo $row['remark']; ?></textarea>
                                </div>
                                <button class="btn btn-success mt-3 px-4" type="submit">Save</button>
                                </form>
                    <?php
                            }
                            else{
                                echo "<script> alert('Data Not Found, Please enter correct roll no.'); </script>";
                            }
                        }
                    ?>
                    <!--====================================================================================-->

                    <!--====================================================================================-->
                    <!--                                  ADD STUDENT SECTION                                      -->
                    <!--====================================================================================-->
                    <?php
                        if(isset($_POST['add_student'])){
                    ?>
                        <form action="add_new_student.php" method="POST">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Roll No.</b></span>
                                    <input type="number" class="form-control" name="roll_no" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Name</b></span>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Father Name</b></span>
                                    <input type="text" class="form-control" name="father_name" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Class</b></span>
                                    <input type="text" class="form-control" name="class" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Contact No.</b></span>
                                    <input type="text" class="form-control" name="mobile" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Email</b></span>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Password</b></span>
                                    <input type="text" class="form-control" name="password" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><b>Remark</b></span>
                                    <textarea class="form-control" name="remark"></textarea>
                                </div>
                                <button class="btn btn-success mt-3 px-4" type="submit">ADD STUDENT</button>
                                </form>
                    <?php
                         }
                    ?>
                    <!--====================================================================================-->

                    <!--====================================================================================-->
                    <!--                                  DELETE STUDENT SECTION                                      -->
                    <!--====================================================================================-->
                    <?php
                        if(isset($_POST['delete_student'])){
                    ?>
                    <form action="delete_student.php" method="POST" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Enter Roll No." aria-label="Search" name="roll_no">
                        <button class="btn btn-success" type="submit" name="search_by_roll_no_for_delete">Delete</button>
                    </form>
                    <?php
                        }
                    ?>
                    <!--====================================================================================-->

                    <!--====================================================================================-->
                    <!--                                  SHOW TEACHERS SECTION                                      -->
                    <!--====================================================================================-->
                    <?php
                        if(isset($_POST['show_teachers'])){
                            include '../connection.php';
                    ?>
                        <h1 class="text-center theading">TEACHERS DETAIL</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Mobile No.</th>
                                <th scope="col">Email Id</th>
                                <th scope="col">Subjects</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                            $query = "SELECT * FROM `teachers_details`";
                            $query_run = mysqli_query($conn, $query);
                            $s_no = 0;
                            while($row = mysqli_fetch_assoc($query_run)){
                            $s_no++;
                    ?>
                                <tr>
                                <th scope="row"><?php echo $row['sno'];?></th>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['position'];?></td>
                                <td><?php echo $row['mobile'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['subjects'];?></td>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                              </tbody>
                        </table>
                    <!--====================================================================================-->
                </div>
            </div>
        </div>
    </div>
    </section>
    
</body>
</html>