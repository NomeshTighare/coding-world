<?php
    $thisPage="Add Student";
    
    include 'config.php';

    if(!isset($_COOKIE['data']))
    {
        if(!isset($_SESSION['auth']))
        {
            header("Location:sign-in.php");
        }
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

        if($_FILES["myFile"]["size"]!=0)
        {
            $path="img/profile/".$_FILES["myFile"]["name"];
            
            // this will check if file is already uploded or not
            if(file_exists($path))
            {
                $flag=3;
            }
            else
            {
                move_uploaded_file($_FILES["myFile"]["tmp_name"],$path);
            }
           
        }
        else{
            $path=NULL;
        }


        $sql="INSERT INTO students(profile_img,fullname,email,mobile,address,dob,gender,blood,auth_id,created)VALUES('$path','$fullname','$email',$mobile,'$address','$dob','$gender','$blood','$auth_id',now())";
        
        if($conn->query($sql)===TRUE)
        {
            $flag=1;
        }
        else
        {
            $flag=2;
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
<div class="d-flex">
      <?php
      // this is turnory oprator in php, it will check if session  is set then it show logout button other wise login
      echo (empty($_SESSION['auth'])) 
        ?
          '<a class="nav-link" href="sign-in.php">
          <button class="btn btn-outline-success" type="submit">Login</button></a>' 
        : 
          '<a class="nav-link" href="logout.php">
          <button class="btn btn-outline-success" type="submit">Logout</button></a>';
      ?>
      </div>
      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Student</li>
            </ol>
        </nav>
<div class="container">
      
<h2 class="h1 h text-center quick text-primary " ><u>Add Student Information</u></h2>
<div class="row">
    <div class="col-md-8 margin-auto">
        <?php 
            if($flag==1)
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Student Added Successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            elseif($flag==2)
            {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Something went wrong.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            }
            elseif($flag==3)
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        File is already present.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            }
        ?>
        <div class="card bg-light ">
            <div class="card-body">
                <form  action="" method="POST" enctype="multipart/form-data">
                
        <div class="row">
                <div class=" col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name">
                </div>
                <div class=" col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                </div>
        </div>
        <div class="row">
                <div class=" col-md-6 mb-3">
                    <label class="form-label">DOB</label>
                    <input type="date" name="dob" class="form-control">
                </div>
                <div class=" col-md-6 mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number">
                </div>

        </div>        
            
                <label class="form-label">Gender</label><br>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
        
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="myFile" style="display: block;border:1px grey black;width:100%;border-radius:5px;background:white;padding:5px"/>
                </div>
                <br>
                
                <label class="form-label">Blood Group</label><br>
                <select class="form-select" name="blood" aria-label="Default select example">
                    <option selected>Select</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <br>
               

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea type="text" name="address" class="form-control" placeholder="Enter Address"></textarea>
                </div>
                
                <div class="mb-3">
                    <button name="submit" type="submit" class="btn btn-outline-primary">Add</button>
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