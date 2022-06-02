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

  <section class="Container event">
    <div class="heading2">EVENT</div>
    <form action="/search_event" method="post">
      <?= csrf_field() ?>
      <input type="text" name="key" placeholder="SEARCH EVENT...." value="<?= $key ?>" />
    </form>

    <div class="box-container">
      <?php if ($result) : ?>
        <?php foreach ($result as $r) : ?>
          <div class="box">
            <img src="assets/img/event/<?= $r->image ?>" alt="">
            <div class="heading3"><?= $r->title ?></div>
            <?php if ($r->tiket == 0) : ?>
              <div class="heading3">STATUS : <b>CLOSED</b></div>
              <a href="#" class="btn_read">CLOSED</a>
            <?php else : ?>
              <div class="heading3">STATUS : <b>OPEN</b></div>
              <a href="/event/detail/<?= $r->id ?>" class="btn_read">REGISTER</a>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="heading2">Tidak Ditemukan</div>
      <?php endif; ?>
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