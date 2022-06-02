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
        <div class="heading1">GOGREEN</div>
        <div class="subheading4">
          Gogreen is a feature that aimsto anticipate <br />
          flood disasters by planting trees <br />
          <br />
          Come join the event that we made and <br />
          if you plant a tree at the event you will get points <br />
          and if you have a lot of points and rank first, <br />
          you will be nicknamed GOGREEN HERO
        </div>
        <a href="/event" class="btn_start mt-20">Get Started</a>
      </div>
      <div class="col hero">
        <img src="assets/img/hero_gogreen.png" alt="" />
      </div>
    </section>
  </header>

  <div class="wave">
    <img src="assets/img/variasi.png" alt="" />
  </div>

  <!-- rank -->
  <section class="Container rank">
    <div class="heading2">RANK</div>
    <div class="row">
      <div class="col">
        <div class="box">
          <img src="assets/img/user/<?= $winner->image ?>" alt="" />
          <div class="heading2"><?= $winner->username ?></div>
          <div class="points"><?= $winner->poin ?></div>
          <div class="caption">points</div>
          <div class="no">1</div>
        </div>
      </div>
      <div class="col">
        <div class="box-container">
          <?php $i = 2 ?>
          <?php foreach ($result as $r) : ?>
            <div class="box-long">
              <div class="heading2"><?= $i++ ?></div>
              <div class="heading2"><?= $r->username ?></div>
              <div class="points"><?= $r->poin ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- How To Use -->
  <section class="Container htu">
    <div class="heading2">HOW TO USE</div>
    <div class="box-container">
      <div class="box">
        <img src="assets/img/select-event.png" alt="" />
        <div class="heading3">select the event you want to participate in</div>
        <div class="no">1</div>
      </div>
      <div class="box">
        <img src="assets/img/form.png" alt="" />
        <div class="heading3">fill in the registration form</div>
        <div class="no">2</div>
      </div>
      <div class="box">
        <img src="assets/img/admin.png" alt="" />
        <div class="heading3">waiting for admin confirmation</div>
        <div class="no">3</div>
      </div>
      <div class="box">
        <img src="assets/img/tree.png" alt="" />
        <div class="heading3">You planted a tree at the event</div>
        <div class="no">4</div>
      </div>
      <div class="box">
        <img src="assets/img/reward.png" alt="" />
        <div class="heading3">you get points</div>
        <div class="no">5</div>
      </div>
      <div class="box">
        <img src="assets/img/shop.png" alt="" />
        <div class="heading3">You can exchange these points for the products we offer</div>
        <div class="no">6</div>
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