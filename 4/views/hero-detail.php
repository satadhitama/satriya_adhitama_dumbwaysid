<?php require_once '../process/connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Hero Detail</title>
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
  <div class="header-bar">
    <h1>Wiki Monster Adventure</h1>
  </div>
  <div class="main">
    <div class="main-container">
      <div class="hero">
          <?php
            $hero_id = $_GET['id'];
            $data = $mysqli->query("SELECT * FROM heroes WHERE id=$hero_id")->fetch_assoc();
            $type = $mysqli->query("SELECT type, color FROM type_tb WHERE id = $data[type_id]")->fetch_assoc();
          ?>
        <div class="hero-image" style="background-image: url(<?= "../assets/heroes/".$data['image'];?>);"></div>
        <h2 class="hero-name"><?= $data['name'];?></h2>
        <h3 class="hero-type" style="color: <?= $type['color'];?> ;"><?= $type['type']?></h3>
        <div class="hero-description">
          <p><?= $data['description'];?></p>
        </div>
        <div class="hero-action">
          <a href="edit-hero.php?id=<?= $data['id']?>" class="btn edit" style="width: 70px;">Edit</a>
          <form action="../process/hero-process.php" method="GET">
            <input type="hidden" name="id" value="<?= $hero_id?>">
            <button name="delete" onclick="return confirm('Do you want to delete?')" class="btn delete" style="font-size: 20px; width: 30px;">&times;</button>
          </form>
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