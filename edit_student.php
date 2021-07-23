<?php
    $thisPage="Edit Student";
    
    include 'config.php';

    $edit=$_GET['q'];
    $file=$_GET['f'];

    if(!isset($_SESSION['auth']))
    {
        header("Location:sign-in.php");
    }
    
    $flag=0;

    if(isset($_POST['submit']))
    {
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $blood=$_POST['blood'];
        $auth_id=$_SESSION['auth']['auth_id'];
        if($_FILES["myFile"]["size"]==0)
        {
            $sql="UPDATE students SET fullname='$fullname',email='$email',mobile=$mobile,address='$address',dob='$dob',gender='$gender',blood='$blood',updated=now() WHERE con_id='$edit'";
        }
        else{

            unlink($file);

            $path="img/profile/".$_FILES["myFile"]["name"];

            // this will check if file is already uploded or not
            if(file_exists($path))
            {
                $flag=2;
            }
            else
            {
                move_uploaded_file($_FILES["myFile"]["tmp_name"],$path);

                $sql="UPDATE students SET fullname='$fullname',email='$email',mobile=$mobile,address='$address',dob='$dob',gender='$gender',blood='$blood',updated=now() WHERE con_id='$edit'";
            }
        }
        
        
        if($conn->query($sql)===TRUE)
        {
            header("Location:view_student.php");   
        }
        else
        {
            $flag=1;
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php';?>
</head>

<body>
    <?php include 'includes/navbar.php';?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Student Information</li>
        </ol>
    </nav>
    <div class="container">
        <h2 class="h2 text-center text-primary mt-5">Edit Student</h2>
        <div class="row">
            <div class="col-md-8 margin-auto">
                <?php 
            if($flag==1)
            {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Something went wrong.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            }
            elseif($flag==2)
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        File is already present
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            }
        ?>
                <div class="card bg-light ">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php
                    $sql="select * from contacts where con_id=".$edit."";
                    $result=$conn->query($sql);
                    $sr=0;
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                ?>
                            <div class="mb-3">
                                <?php 
                        if($row['profile_img']==NULL)
                        {
                            echo'<p class="text-danger">Profile image is yet not set</p>';
                        }
                        else
                        {
                            echo '<img src="'.$row["profile_img"].'" height="200px" width="200px"/>';
                        }
                    ?>
                                <br>
                                <label class="form-label">Select Profile</label>
                                <input type="file" name="myFile"
                                    style="display: block;border:1px grey black;width:100%;border-radius:5px;background:white;padding:5px" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"
                                    class="form-control" placeholder="ABC XYZ">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="<?php echo $row['email']; ?>"
                                    class="form-control" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="number" name="mobile" value="<?php echo $row['mobile']; ?>"
                                    class="form-control" placeholder="9800000000">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea type="text" name="address" class="form-control"
                                    placeholder="Enter Address"><?php echo $row['address']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">DOB</label>
                                <input type="date" name="dob" class="form-control" <?php echo $row['dob']; ?>></input>
                            </div>
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                    value="male" <?php echo $row['dob']; ?>>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                    value="female" <?php echo $row['dob']; ?>>
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Group :</label>
                                <select class="form-select" aria-label="Default select example" name="blood">
                                    <option value="A+" <?php if($row["gender"]=="A+"){echo "selected";} ?>>A+</option>
                                    <option value="B+" <?php if($row["gender"]=="B+"){echo "selected";} ?>>B+</option>
                                    <option value="O+" <?php if($row["gender"]=="O+"){echo "selected";} ?>>O+</option>
                                    <option value="O-" <?php if($row["gender"]=="O-"){echo "selected";} ?>>o-</option>
                                </select>
                            </div>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<h3>Data Not Found</h3>";
                    }      
                ?>
                            <div class="mb-3">
                                <button name="submit" type="submit" class="btn btn-outline-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php';?>
    <?php include 'includes/script.php';?>
</body>

</html>