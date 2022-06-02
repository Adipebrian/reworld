<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ReWorld-Green | Detail</title>
  <link rel="stylesheet" href="../../../assets/css/layout.css" />
  <link rel="stylesheet" href="../../../assets/css/style.css" />
</head>

<body>
  <!-- header -->
  <header class="Container hijau-muda">
    <nav>
      <a href="/" class="logoNav">
        <img src="../../../assets/img/logoNav.png" alt="" />
      </a>
      <ul>
        <li><a class="heading3" href="/safoture">Safoture</a></li>
        <li><a class="heading3" href="/gogreen">Gogreen</a></li>
        <li><a class="heading3" href="/about">About Us</a></li>
      </ul>
      <a href="/login" class="btn_login">Login</a>
    </nav>
  </header>

  <section class="Container detail">
    <div class="heading2"><?= $result->title ?></div>

    <div class="box">
      <img src="../../../assets/img/event/<?= $result->image ?>" alt="" />
      <div class="heading2"><?= $result->title ?></div>
      <div class="subheading3">
        <?= $result->content ?>
      </div>
      <div class="subheading3 mt-20">
        <b>Nama Event :</b><?= $result->title ?> <br />
        <b>Tanggal :</b><?= $result->tanggal ?><br />
        <b>Pukul :</b> <?= $result->pukul ?> <br />
        <b>Tempat :</b> <?= $result->tempat ?> <br />
        <b>Tiket tersisa :</b> <?= $result->tiket ?> <br />
        <b>Biaya :</b> <?= $result->biaya ?> <br />
      </div>
      <?php if ($result->tiket == 0) : ?>
        <a href="#" class="btn_start" style="background-color: red;">CLOSED</a>
      <?php else : ?>
        <a href="/gogreen/add/<?= $result->id ?>" class="btn_start">REGISTER</a>
      <?php endif; ?>
    </div>
  </section>

  <footer class="Container">
    <div class="col">
      <img src="../../../assets/img/logoFooter.png" alt="" />
      <div class="subheading4 white">
        Keep The Earth Clean <br />
        For Me And You
      </div>
      <ul>
        <li><a href="/safoture" class="heading3">Safoture</a></li>
        <li><a href="/gogreen" class="heading3">Gogreen</a></li>
        <li><a href="/about" class="heading3">ABOUT Us</a></li>
      </ul>
    </div>
    <div class="col">
      <div class="heading2 white">OUR SOCIAL MEDIA</div>
      <div class="sosmed-container">
        <div class="sosmed">
          <img src="../../../assets/img/email.png" alt="" />
          <a href="#" class="caption white">reworld@gmail.com</a>
        </div>
        <div class="sosmed">
          <img src="../../../assets/img/ig.png" alt="" />
          <a href="#" class="caption white">REWORLD.GREEN</a>
        </div>
        <div class="sosmed">
          <img src="../../../assets/img/wa.png" alt="" />
          <a href="#" class="caption white">0895405270401</a>
        </div>
      </div>
    </div>
  </footer>
  <div class="cp heading3 white">Design By <a class="heading3 white" href="#">Adi Pebrian</a></div>
</body>

</html>