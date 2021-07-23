<?php
    $thisPage="Instructor Corner";
    
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
       
        $tfullname=$_POST['tfullname'];
        $temail=$_POST['temail'];
        $tmobile=$_POST['tmobile'];
        $taddress=$_POST['taddress'];
        $tdob=$_POST['tdob'];
        $tgender=$_POST['tgender'];
        $tcourse=$_POST['tcourse'];
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


        $sql="INSERT INTO teacher(tprofile_img,tfullname,temail,tmobile,taddress,tdob,tgender,tcourse,auth_id,tcreated)VALUES('$path','$tfullname','$temail',$tmobile,'$taddress','$tdob','$tgender','$tcourse','$auth_id',now())";
        
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
    <div class="view">
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
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Instructor</li>
            </ol>
        </nav>
        <div class="container">
            <h1 class="h1 text-center quick text-primary "><u>Add Instructor Information</u></h1>
            <div class="row">
                <div class="col-md-8 margin-auto">
                    <?php 
            if($flag==1)
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Teacher Added Successfully
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
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Instructor Name</label>
                                        <input type="text" name="tfullname" class="form-control"
                                            placeholder="Enter Instructor Name">
                                    </div>
                                    <div class=" col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="temail" class="form-control"
                                            placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">DOB</label>
                                        <input type="date" name="tdob" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mobile</label>
                                        <input type="number" name="tmobile" class="form-control"
                                            placeholder="Enter Mobile Number">
                                    </div>
                                </div>

                                <label class="form-label">Gender</label><br>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" name="tgender" id="inlineRadio1"
                                        value="male">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tgender" id="inlineRadio2"
                                        value="female">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label class="form-label">Select Profile</label>
                                    <input type="file" name="myFile"
                                        style="display: block;border:1px grey black;width:100%;border-radius:5px;background:white;padding:5px" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea type="text" name="taddress" class="form-control"
                                        placeholder="Enter Address"></textarea>
                                </div>
                                <label class="form-label">Courses</label><br>
                                <select class="form-select" name="tcourse" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="C">C</option>
                                    <option value="C++">C++</option>
                                    <option value="Web Designing">Web Designing</option>
                                    <option value="Data Structures">Data Structures</option>
                                    <option value="PHP for Beginners">PHP for Beginners</option>
                                    <option value="Java Programming">Java Programming</option>
                                    <option value="Python Programming">Python Programming</option>
                                    <option value="MERN Stack">MERN Stack</option>
                                    <option value="Android Development">Android Development</option>
                                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                                    <option value="Networking">Networking</option>
                                    <option value="Ethical Hacking">Ethical Hacking</option>
                                </select>
                                <br>

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