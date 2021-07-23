<?php
    $thisPage="Login";

    include 'config.php';

    $flag=0;

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username=$_POST['username'];
        $pass=md5($_POST['pass']);

        if(!empty($_POST['saveme']))
        {
            $saveme=$_POST['saveme'];
        }

        $sql="SELECT * from register Where username='$username' AND pass='$pass'";

        $result = $conn->query($sql);

        if($result -> num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                $_SESSION['auth']=$row;

                if(!empty($_POST['saveme']))
                {
                    setcookie("data",$row['email'],time()+86400);
                    // formate is setcookie(data_variable,data_value,expiry time in second)
                }
                header("Location:dashboard.php");
            }
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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bod">
    <?php include 'includes/navbar1.php';?>
    <div class="marg">
        <h2 class="h2 text-center  logsign">Welcome To Login</h2>
        <div class="row">
            <div class="col-md-5 margin-auto">
                <?php 
            if($flag==1)
            {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        User is not registered With us
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            }
        ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                            <div class="txt_field">
                                <input type="text" name="username" required>
                                <span></span>
                                <label>Username</label>
                                <!-- <label for="exampleFormControlInput1" class="form-label">Username</label> -->
                                <!-- <input type="text" name="username" class="form-control" id="exampleFormControlInput1" required> -->
                            </div>

                            <div class="txt_field">
                                <input type="password" name="pass" required>
                                <span></span>
                                <label>Password</label>
                                <!-- <label for="exampleFormControlInput1" class="form-label">Password</label> -->
                                <!-- <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="Password" required> -->
                            </div>
                            <input type="submit" value="Login">
                            <div class="signup_link">
                                Not have any account ? <a href="sign-up.php"> Sign-up Here </a>
                            </div>
                            <!-- <button name="submit" type="submit" class="btn btn-outline-primary">Login</button> -->

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