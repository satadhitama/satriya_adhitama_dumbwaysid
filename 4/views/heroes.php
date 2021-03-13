<?php require_once '../process/connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Heroes</title>
</head>
<body>
  <div class="sidebar">
    <nav>
      <a href="index.php">Home</a>
      <a href="heroes.php">Heroes</a>
      <a href="types.php">Types</a>
    </nav>
  </div>
  <i class="fa fa-bars"></i>
  <script src="/app.js"></script>
  <div class="header-bar">
    <h1>Wiki Monster Adventure</h1>
  </div>
  <div class="main">
    <div class="main-container">
      <div class="contents">
        <h1>Heroes</h1>
        <div class="heroes-top">
          <div class="choose-type">
            <p>Pilih hero types</p>
            <form action="" method="GET">
              <select name="type_id" id="select-type">
                <option value="">Types</option>
                <?php 
                $result = $mysqli->query("SELECT * FROM type_tb");
                foreach($result as $data):
                ?>
                <option value="<?= $data['id']?>"><?= $data['type']?></option>
                <?php endforeach;?>
              </select>
              <button name="search" style="background-color: rgba(0,0,0,0); outline:none; border: none;"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="add-hero">
          <a href="add-hero.php" class="btn add">Tambah Hero</a>
          </div>
        </div>
        <div class="heroes-container">
          <?php
            $result = $mysqli->query('SELECT * FROM heroes');
            foreach($result as $data):
          ?>
          <div class="card">
            <div class="hero-image" style="background-image: url(<?= "../assets/heroes/".$data['image'];?>);"></div>
            <?php $type = $mysqli->query("SELECT type, color FROM type_tb WHERE id = $data[type_id]")->fetch_assoc();?>
            <h2 class="hero-name"><?= $data['name'];?></h2>
            <h3 class="hero-type" style="color: <?= $type['color'];?> ;"><?= $type['type']?></h3>
            <a action="hero-detail.php?id=<?= $data['id'];?>" class="btn hero-detail">Detail</a>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer-content">
      <p class="designer">This page was originally made by <span>Satriya Adhitama</span></p>
      <a href="https://www.instagram.com/sattama_/" class="fa fa-instagram"></a>
    </div>
  </div>
  <script src="../app.js"></script>
</body>
</html>