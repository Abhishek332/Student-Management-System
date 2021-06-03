<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: admin_login.php");
        exit;
    }
?>

<script>
    if(confirm('Are you sure want to delete ?')){
        document.write("<?php
            include '../connection.php';
            $roll_no = $_POST['roll_no'];
            $query = "DELETE FROM `student_login` WHERE `roll_no` = '$roll_no'";
            $query_run = mysqli_query($conn, $query);
        ?>");
        window.location.href = "admin_dashboard.php";
    }
</script>