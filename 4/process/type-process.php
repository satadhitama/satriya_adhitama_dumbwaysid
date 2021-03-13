<?php

require_once 'connection.php';

if (isset($_POST['add'])) {
  $type = $_POST['type'];
  $color = $_POST['color'];
  $mysqli->query(
    "INSERT INTO type_tb (type, color) VALUES ('$type','$color')");
  header('Location: ../views/types.php');
}

if (isset($_POST['edit'])) {
  $id = $_GET['id'];
  $type = $_POST['type'];
  $color = $_POST['color'];
  $mysqli->query(
    "UPDATE type_tb
    SET type='$type', color='$color'
    WHERE id='$id'");
  header('Location: ../views/types.php');
}
if (isset($_GET['delete'])) {
  $id = $_GET['id'];
  $mysqli->query(
    "DELETE FROM type_tb
    WHERE id='$id'");
  header('Location: ../views/types.php');
}
?> 