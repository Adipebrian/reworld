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

    <section class="banner">
      <div class="col text">
        <div class="caption">SAVE THE EARTH, SAVE A LIFE!</div>
        <div class="heading1">
          FOREST ARE GREEN <br />
          OCEANS ARE BLUE
        </div>
        <div class="subheading1">
          Keep The Earth Clean <br />
          For Me And You
        </div>

        <a href="/login" class="btn_start mt-20">Get Started</a>
      </div>
      <div class="col hero">
        <img src="assets/img/hero_home.png" alt="" />
      </div>
    </section>
  </header>

  <div class="wave">
    <img src="assets/img/variasi.png" alt="" />
  </div>

  <!-- About Us -->

  <section class="Container aboutUs">
    <div class="heading2">ABOUT US</div>
    <div class="subheading2">
      ReWorld-Green is a website that <br />
      was created with the aim of reducing <br />
      food waste and also anticipating flooding by planting trees
    </div>

    <div class="box-container">
      <div class="box">
        <img src="assets/img/safoture.png" alt="" />
        <div class="heading2">Safoture</div>
        <div class="subheading3">Safoture is a feature that aims to reduce food waste by turning it into fertilizer</div>
        <a href="/safoture" class="btn_read mt-20">Read More</a>
      </div>
      <div class="box">
        <img src="assets/img/gogreen.png" alt="" />
        <div class="heading2">Gogreen</div>
        <div class="subheading3">Gogreen is a feature that aimsto anticipate flood disasters by planting trees</div>
        <a href="/gogreen" class="btn_read mt-20">Read More</a>
      </div>
    </div>
  </section>

  <div class="wave hijau-muda">
    <img src="assets/img/variasi2.png" alt="" />
  </div>

  <!-- Data -->
  <section class="Container data hijau-muda">
    <div class="heading2">DATA</div>
    <div class="box-container">
      <div class="box">
        <div class="col">
          <div class="heading1"><?= $waste->berat ?></div>
          <div class="heading2">WASTE</div>
        </div>
        <div class="col">
          <img src="assets/img/waste.png" alt="" />
          <div class="heading3">collected garbage</div>
        </div>
      </div>
      <div class="box" id="balik">
        <div class="col">
          <div class="heading1"><?= $pohon->berat ?></div>
          <div class="heading2">TREE</div>
        </div>
        <div class="col">
          <img src="assets/img/gogreen.png" alt="" />
          <div class="heading3">Planted TREE DATA</div>
        </div>
      </div>
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