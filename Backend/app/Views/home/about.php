<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ReWorld-Green | Home</title>
  <link rel="stylesheet" href="assets/css/layout.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!-- header -->
  <header class="Container hijau-muda">
    <nav>
      <a href="/" class="logoNav">
        <img src="assets/img/logoNav.png" alt="" />
      </a>
      <ul>
        <li><a class="heading3" href="/safoture">Safoture</a></li>
        <li><a class="heading3" href="/gogreen">Gogreen</a></li>
        <li><a class="heading3" href="/about">About Us</a></li>
      </ul>
      <?php if (logged_in()) : ?>
        <a href="/user/index" class="btn_login">Profile</a>
      <?php else : ?>
        <a href="/login" class="btn_login">Login</a>
      <?php endif; ?>
    </nav>
  </header>

  <section class="Container about">
    <div class="heading2">ABOUT US</div>
    <div class="box">
      <img src="assets/img/hero_home.png" alt="" />
      <div class="subheading3">
        ReWorld-Green is a website that was created with the aim of reducing food waste and also anticipating flooding by planting trees We have 2 features namely :
        <br> <br>
        Safoture and Gogreen Safoture is a feature that aims to reduce food waste
        by turning it into fertilizer. If there is leftover food that can be eaten and is stale, send it to us, then if the food is stale we will make fertilizer and if it is still edible, we will distribute it to those who need it more.
        <br> <br>
        Gogreen is a feature that aimsto anticipate flood disasters by planting trees Come join the event that we made and if you plant a tree at the event you will get points and if you have a lot of points and rank first, you will be
        nicknamed GOGREEN HERO
      </div>
    </div>
    <div class="team">
      <div class="heading2">DEVELOPER</div>
      <img src="assets/img/adi.jpg" alt="">
      <div class="heading3">ADI PEBRIAN</div>
      <div class="heading3">FULL STACK DEVELOPER</div>
    </div>
  </section>

  <footer class="Container">
    <div class="col">
      <img src="assets/img/logoFooter.png" alt="" />
      <div class="subheading4 white">
        Keep The Earth Clean <br />
        For Me And You
      </div>
      <ul>
        <li><a href="/safoture" class="heading3">Safoture</a></li>
        <li><a href="/safoture" class="heading3">Gogreen</a></li>
        <li><a href="/about" class="heading3">ABOUT Us</a></li>
      </ul>
    </div>
    <div class="col">
      <div class="heading2 white">OUR SOCIAL MEDIA</div>
      <div class="sosmed-container">
        <div class="sosmed">
          <img src="assets/img/email.png" alt="" />
          <a href="#" class="caption white">reworld@gmail.com</a>
        </div>
        <div class="sosmed">
          <img src="assets/img/ig.png" alt="" />
          <a href="#" class="caption white">REWORLD.GREEN</a>
        </div>
        <div class="sosmed">
          <img src="assets/img/wa.png" alt="" />
          <a href="#" class="caption white">0895405270401</a>
        </div>
      </div>
    </div>
  </footer>
  <div class="cp heading3 white">Design By <a class="heading3 white" href="#">Adi Pebrian</a></div>
</body>

</html>