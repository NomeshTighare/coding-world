<?php
    $thisPage="sign up";

    include 'config.php';

    $flag=0;

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $pass=$_POST['pass'];
        $conf_pass=$_POST['conf_pass'];

        if($pass==$conf_pass)
        {
            $pass=md5($pass);

            $sql="INSERT INTO register(name,username,pass,email,created)VALUES('$name','$username','$pass','$email',now())";
            if($conn->query($sql)===TRUE)
            {
                $flag=1;
            }
            else
            {
                $flag=2;
            }
        }
        else
        {
           $flag=3;
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php';?>
</head>

<body class="bo">
    <?php include 'includes/navbar1.php';?>

    <div class="marg">
        <h2 class="h2 text-center logsign">Welcome To Registration</h2>
        <hr>
        <div class="row">
            <div class="col-md-5 margin-auto">
                <?php 
            if($flag==1){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Account Created Successfully
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
                        Password are not matched.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            }
        ?>
                <div class="card bg-light ">
                    <div class="card-body">
                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                            <div class="txt_field">
                                <input type="text" name="name" required>
                                <span></span>
                                <label>Name</label>
                                <!-- <label for="exampleFormControlInput1" class="form-label">Name</label> -->
                                <!-- <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="XYZ"> -->
                            </div>
                            <div class="txt_field">
                                <input type="email" name="email" required>
                                <span></span>
                                <label>Email Address</label>
                                <!-- <label for="exampleFormControlInput1" class="form-label">Email</label> -->
                                <!-- <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"> -->
                            </div>
                            <div class="txt_field">
                                <input type="text" name="username" required>
                                <span></span>
                                <label>Username</label>
                                <!-- <label for="exampleFormControlInput1" class="form-label">Username</label> -->
                                <!-- <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="xyz"> -->
                            </div>
                            <div class="txt_field">
                                <input type="password" name="pass" required>
                                <span></span>
                                <label>Password</label>
                                <!-- <label for="exampleFormControlInput1" class="form-label">Password</label> -->
                                <!-- <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="Password"> -->
                            </div>
                            <div class="txt_field">
                                <input type="password" name="conf_pass" required>
                                <span></span>
                                <label>Confirm Password</label>
                                <!-- <label for="exampleFormControlInput1" class="form-label">Confirm Password</label> -->
                                <!-- <input type="password" name="conf_pass" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password"> -->
                            </div>
                            <input type="submit" value="Registration">
                            <div class="signup_link">
                                Already a user ? <a href="sign-in.php"> login </a>
                            </div>

                            <!-- <div class="mb-3">
                    <button name="submit" type="submit" class="btn btn-outline-primary">Create</button>

                    Already a user ? then click <a href="sign-in.php"> login </a>
                </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'includes/footer.php';?>
    <?php include 'includes/script.php';?>
</body>

</html>