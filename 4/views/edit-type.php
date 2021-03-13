<?php require_once '../process/connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
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
      <div class="contents">
        <h1>Edit Type</h1>
        <div class="form-container">
          <?php
            $type_id = $_GET['id'];
            $data = $mysqli->query("SELECT type FROM type_tb WHERE id=$type_id")->fetch_assoc();
           ;?>
          <form action="../process/type-process.php?id=<?= $type_id?>" method="POST">
            <label for="">Type</label> <br>
            <input name="type" type="text" value="<?= $data['type']?>"> <br>
            <label for="">Type-color</label> <br>
            <input name="color" type="color">
            <input name="edit" class="btn edit" type="submit" style="width: 60px; margin-top: 30px;" value="Tambah">
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