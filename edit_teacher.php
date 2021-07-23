<?php
    $thisPage="Edit Teacher";
    
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
        $tfullname=$_POST['tfullname'];
        $temail=$_POST['temail'];
        $tmobile=$_POST['tmobile'];
        $taddress=$_POST['taddress'];
        $tdob=$_POST['tdob'];
        $tgender=$_POST['tgender'];
        $tcourse=$_POST['tcourse'];
      
        $auth_id=$_SESSION['auth']['auth_id'];
        if($_FILES["myFile"]["size"]==0)
        {
            $sql="UPDATE teacher SET tfullname='$tfullname',temail='$temail',tmobile=$tmobile,taddress='$taddress',tdob='$tdob',tgender='$tgender',tcourse='$tcourse',tupdated=now() WHERE tcon_id='$edit'";
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

                $sql="UPDATE teacher SET tfullname='$tfullname',temail='$temail',tmobile=$tmobile,taddress='$taddress',tdob='$tdob',tgender='$tgender',tcourse='$tcourse',tupdated=now() WHERE tcon_id='$edit'";
            }
        }
        
        
        if($conn->query($sql)===TRUE)
        {
            header("Location:view_teacher.php");   
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
            <li class="breadcrumb-item active" aria-current="page">Edit Teacher Information</li>
        </ol>
    </nav>
    <div class="container">
        <h2 class="h2 text-center text-primary mt-5">Edit Teacher</h2>
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
                    $sql="select * from teacher where tcon_id=".$edit."";
                    $result=$conn->query($sql);
                    $sr=0;
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                ?>
                            <div class="mb-3">
                                <?php 
                        if($row['tprofile_img']==NULL)
                        {
                            echo'<p class="text-danger">Profile image is yet not set</p>';
                        }
                        else
                        {
                            echo '<img src="'.$row["tprofile_img"].'" height="200px" width="200px"/>';
                        }
                    ?>
                                <br>
                                <label class="form-label">Select Profile</label>
                                <input type="file" name="myFile"
                                    style="display: block;border:1px grey black;width:100%;border-radius:5px;background:white;padding:5px" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="tfullname" value="<?php echo $row['tfullname']; ?>"
                                    class="form-control" placeholder="Enter Full Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="temail" value="<?php echo $row['temail']; ?>"
                                    class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="number" name="tmobile" value="<?php echo $row['tmobile']; ?>"
                                    class="form-control" placeholder="Enter Mobile Number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea type="text" name="taddress" class="form-control"
                                    placeholder="Enter Address"><?php echo $row['taddress']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">DOB</label>
                                <input type="date" name="tdob" class="form-control" <?php echo $row['tdob']; ?>></input>
                            </div>
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" name="tgender" id="inlineRadio1"
                                    value="male" <?php echo $row['tgender']; ?>>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tgender" id="inlineRadio2"
                                    value="female" <?php echo $row['tgender']; ?>>
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Course :</label>
                                <select class="form-select" aria-label="Default select example" name="tcourse">
                                    <option value="C" <?php if($row["tcourse"]=="C"){echo "selected";} ?>>C</option>
                                    <option value="C++" <?php if($row["tcourse"]=="C++"){echo "selected";} ?>>C++
                                    </option>
                                    <option value="Web Designing"
                                        <?php if($row["tcourse"]=="Web Designing"){echo "selected";} ?>>Web Designing
                                    </option>
                                    <option value="Python Programming "
                                        <?php if($row["tcourse"]=="Python Programming"){echo "selected";} ?>>Python
                                        Programming</option>
                                    <option value="Data Structures"
                                        <?php if($row["tcourse"]=="Data Structures"){echo "selected";} ?>>Data
                                        Structures</option>
                                    <option value="PHP for Beginners"
                                        <?php if($row["tcourse"]=="PHP for Beginners"){echo "selected";} ?>>PHP for
                                        Beginners</option>
                                    <option value="Java Programming"
                                        <?php if($row["tcourse"]=="Java Programming"){echo "selected";} ?>>Java
                                        Programming</option>
                                    <option value="MERN Stack"
                                        <?php if($row["tcourse"]=="MERN Stack"){echo "selected";} ?>>MERN Stack</option>
                                    <option value="Android Development"
                                        <?php if($row["tcourse"]=="Android Development"){echo "selected";} ?>>Android
                                        Development</option>
                                    <option value="ARTIFICIAL INTELLIGENCE"
                                        <?php if($row["tcourse"]=="Artificial Intelligence"){echo "selected";} ?>>
                                        ARTIFICIAL INTELLIGENCE</option>
                                    <option value="NETWORKING"
                                        <?php if($row["tcourse"]=="NETWORKING"){echo "selected";} ?>>NETWORKINGk
                                    </option>
                                    <option value="ETHICAL HACKING"
                                        <?php if($row["tcourse"]=="Ethical Hacking"){echo "selected";} ?>>ETHICAL
                                        HACKING</option>
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