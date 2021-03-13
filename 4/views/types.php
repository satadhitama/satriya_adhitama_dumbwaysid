<?php require_once '../process/connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Types</title>
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
        <h1>Types</h1>
        <a href="add-type.php" class="btn add" style="width: 150px; margin-bottom: 20px;">Tambah type</a>
        <div class="type-table">
          <div class="table-head">
            <h4 class="cell-type">Type</h4>
            <h4 class="cell-action">Action</h4>
          </div>
          <?php
            $result = $mysqli->query("SELECT * FROM type_tb");
            if (isset($_GET)) {
              $result = $mysqli->query(
                "SELECT * FROM heroes
                JOIN type_tb
                ON heroes.type_id = type_tb.id
                WHERE heroes.type_id = $type_id");
            }
            print_r($result);
            foreach($result as $data) :
          ?>
          <div class="table-data">
            <p class="cell-type"><?php echo $data['type'];?></p>
            <div class="cell-action">
              <a href="edit-type.php?id=<?php echo $data['id'];?>" class="btn edit">Edit</a>
              <form action="../process/type-process.php" method="GET">
                <input name='id' value="<?php echo $data['id'];?>" type="hidden">
                <button name="delete" class="btn delete" style="font-size: 20px;" onclick="return confirm('Do you want to delete?')">&times;</button>
              </form>
            </div>
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