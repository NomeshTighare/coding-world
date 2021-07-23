<?php
    $thisPage="Home";
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php';?>
</head>

<body class="body">
  <div class="mar">
    <?php include 'includes/navbar1.php';?>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-9">
          <marquee width="90%" scrollamount="2" direction="left" height="80%">

            <a href="course.php" target="blank"> New Admissions in Augest Bootcamp start on 25th july <img
                src="img/new_blink.gif"> </a>

          </marquee>
        </div>
        <div class="col-3">
          <div btn-group>
            <a href="sign-in.php">Login</a>
            <a href="sign-up.php">Registration</a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <!-- slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
          aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner ">
        <div class="carousel-item active ">
          <img src="img/set.jpg" class="d-block w-100 slider" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/webd.jpg" class="d-block w-100 slider" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/mernn.jpg" class="d-block w-100 slider" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/connect.jpg" class="d-block w-100 slider" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- slider end -->
    <main class="shop" class="body-shop">
      <div class="div1 notic contact-btn cen">
        <h2> <u>Updates</u></h2>

        <marquee width="90%" scrollamount="2" direction="up" height="80%">

          <a href="https://developer.android.com/studio?gclid=CjwKCAjw3MSHBhB3EiwAxcaEu6OCp8x8sHjMVhOvNWeCEGCwNOXY1PxGizBIsbDWmIY01Dq7WYhbnhoCafIQAvD_BwE&gclsrc=aw.ds"
            target="_blank">Latest Android Studio 4.2.2 <img src="img/new_blink.gif"> </a>
          <hr>
          <a href="https://code.visualstudio.com/updates/v1_58" target="_blank" style=""> Vs Code Version 1.58<img
              src="img/new_blink.gif"> </a>
          <hr>
          <a href="https://docs.python.org/3/whatsnew/3.9.html" target="_blank">What’s New In Python 3.9<img
              src="img/new_blink.gif"> </a>
          <hr>
          <a href="https://reactjs.org/blog/2020/10/20/react-v17.html" target="_blank">React v17.0<img
              src="img/new_blink.gif"> </a>
          <hr>
          <a href="https://nodejs.org/en/download/" target="_blank">Node. Js Version: 14.17.3<img
              src="img/new_blink.gif"> </a>
          <hr>
          <a href="https://www.mongodb.com/evolved" target="_blank">MongoDB Evolved – Version History<img
              src="img/new_blink.gif"> </a>
          <hr>
        </marquee>
      </div>

      <div class="div2 contact-btn cen">
        <div class="row">
          <div class="col-5 train ">
            <h1> Best IT Training </h1>
            <br>
            <h5>Best IT Training & Live Project Training institute with over 1000+ students trained and placed
              in Android , Java, PHP, Python, Web Design, Ethical Hacking, C, C++, Mern Stack.
            </h5>
          </div>
          <div class="col-7 ">
            <img src="img/wrk.gif" style="width:450px;height:300px; margin-top:60px">
          </div>

        </div>
      </div>

      <div class="div4  notic  contact-btn cen">
        <h2> <u>News & Events </u> </h2>
        <marquee width="90%" scrollamount="2" direction="up" height="80%">

          <a href="https://android-developers.googleblog.com/2021/07/android-12-beta-3-for-tv-is-now.html"
            target="_blank">Android 12 Beta 3 for TV is now available<img src="img/new_blink.gif"> </a>
          <hr>
          <a href="https://kinsta.com/blog/php-7-4/" target="_blank"> PHP 7.4 (official release) is available<img
              src="img/new_blink.gif"> </a>
          <hr>
          <a href="https://medium.com/microsoft-design/windows-11-designing-the-next-generation-of-windows-490c02fb6373"
            target="_blank">Windows 11: Designing the Next Generation<img src="img/new_blink.gif"> </a>
          <hr>

        </marquee>
      </div>
    </main>
    <center>
      <h1 style="font-family: 'Times New Roman', Times, serif;"> Top Courses </h1>
    </center>
    <hr>

    <div class="container">
      <div class="row" style="margin-top:10px;margin-bottom:10px">
        <div class="col-3 ">
          <div class="flip-card" style="width:250px">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="img/java.png" alt="Avatar" style="width:250px;height:250px;">
              </div>
              <div class="flip-card-back">
                <h1>Java Programming</h1>
                <p>App Development</p>

              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="flip-card " style="width:250px">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="img/cprog.png" alt="Avatar" style="width:250px;height:250px;">
              </div>
              <div class="flip-card-back">
                <h1>C Programming</h1>
                <p>Programming language</p>

              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="flip-card" style="width:250px">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="img/mern.jpg" alt="Avatar" style="width:250px;height:250px;">
              </div>
              <div class="flip-card-back">
                <h1>Mern Stack</h1>
                <p>Full Stack Development</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="flip-card" style="width:250px">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="img/hack.jpg" alt="Avatar" style="width:250px;height:250px;">
              </div>
              <div class="flip-card-back">
                <h1>Ethical Hacking</h1>
                <p>Cyber Security</p>
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