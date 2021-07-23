<?php
    $thisPage="Dashboard";

    include 'config.php'; 
    
    if(!isset($_SESSION['auth']))
    {
        header("Location:sign-in.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php';?>
</head>

<body>
    <?php include 'includes/navbar.php';?>
    <div class="container dash">
        <h1 class="h1 text-center quick text-primary">Welcome</h1>
        <hr>

        <div class="card cen text-center" style="width: 18rem;">
            <div class="card-body dashc">
                <h5 class="h2 card-title">Hello</h5>
                <p class=" h3 card-text"><?php echo $_SESSION['auth']['name'];?></p>
                <p class=" h5 card-text"><?php echo $_SESSION['auth']['email'];?></p>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php';?>
    <?php include 'includes/script.php';?>
</body>

</html>