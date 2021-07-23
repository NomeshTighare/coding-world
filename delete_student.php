<?php
    $del=$_GET['q'];
    $file=$_GET['f'];
    include 'config.php';

    if (!isset($_SESSION['auth'])) 
    {
        header("Location:sign-in.php");
    }

    if(isset($_GET['q']))
    {
        $sql="DELETE from students WHERE con_id='$del'";
        if($conn->query($sql)===TRUE)
        {
            unlink($file);
            echo '<script>alert("Data Deleted Successfully");</script>';
        }
        else
        {
            echo '<script>alert("Something went wrong");</script>';
        }
        header("Location:view_student.php");
    }
?>