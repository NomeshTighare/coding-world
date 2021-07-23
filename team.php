<?php
    $thisPage="Team";
    include 'config.php';
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
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include 'includes/navbar1.php';?>
    <div class="container">
        <h1 class="team">TEAM</h1>
        <hr>
        <div class="row">
            <div class="col-6  boxm">
                <div class="profile-card">
                    <div class="card-header">
                        <div class="pic">
                            <img src="img/ani.jpg" alt="">
                        </div>
                        <div class="name">Aniket Vairagade</div>
                        <div class="desc"> Web Developer</div>
                        <hr>
                        <div class="sm">
                            <a href="https://www.facebook.com/profile.php?id=100005184887016" target="_blank"
                                class="fab fa-facebook-f"></a>
                            <a href="https://www.linkedin.com/in/aniket-vairagade-a02235190" target="_blank"
                                class="fab fa-linkedin"></a>

                            <a href="https://instagram.com/aniket__click?utm_medium=copy_link" target="_blank"
                                class="fab fa-instagram"></a>
                            <a href="https://github.com/aniketvairagade" target="_blank" class="fab fa-github"></a>
                        </div>
                        <div class="contact-btn cen">

                            <h5><img src="img/email.png" height="30px" width="30px"> Aniketvairagade2000@gmail.com </h5>
                            <img src="img/phone-call.png" height="30px" width="30px">
                            <h5>7887776471</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-6 boxm">
                <div class="profile-card">
                    <div class="card-header">
                        <div class="pic">
                            <img src="img/nom.jpg" alt="">
                        </div>
                        <div class="name">Nomesh Tighare</div>
                        <div class="desc"> Web Developer</div>
                        <hr>
                        <div class="sm">
                            <a href="https://www.facebook.com/Nomu04" target="_blank" class="fab fa-facebook-f"></a>
                            <a href="https://www.linkedin.com/in/nomesh-tighare-223501180" target="_blank"
                                class="fab fa-linkedin"></a>

                            <a href="https://instagram.com/n_o_m_u_04?utm_medium=copy_link" target="_blank"
                                class="fab fa-instagram"></a>
                            <a href="https://github.com/NomeshTighare" target="_blank" class="fab fa-github"></a>
                        </div>
                        <div class="contact-btn cen">
                            <img src="img/email.png" height="30px" width="30px">
                            <h5> Nomeshtighare@gmail.com </h5>
                            <img src="img/phone-call.png" height="30px" width="30px">
                            <h5>8956579244</h5>
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