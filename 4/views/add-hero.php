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
        <h1>Tambah Hero</h1>
        <div class="form-container">
          <form action="../process/hero-process.php" method="POST" enctype="multipart/form-data">
            <label for="">Nama Hero</label> <br>
            <input type="text" name="name"> <br>
            <label for="">Type</label> <br>
            <select name="type" id="">
              <?php 
                $result = $mysqli->query("SELECT * FROM type_tb");
                foreach($result as $data):
              ?>
              <option value="<?= $data['id']?>"><?= $data['type']?></option>
              <?php endforeach;?>
            </select> <br>
            <label for="description">Description</label> <br>
            <textarea name="description" id="description" cols="30" rows="10" charswidth="23" style="resize: vertical;"></textarea>
            <p></p> <br>
            <label for="">Foto</label> <br>
            <input method="file" type="File" name="image">
            <input name="add" class="btn add" type="submit" style="width: 60px; margin-top: 30px;" value="Tambah">
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