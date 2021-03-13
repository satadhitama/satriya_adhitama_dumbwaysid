<?php

require_once 'connection.php';

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $image = $_FILES['image'];
  
  $highest_idq = $mysqli->query(
    "SELECT MAX(id) FROM heroes");
  $current_id = $highest_idq->fetch_assoc()['MAX(id)'] + 1;
  $path_parts = pathinfo($_FILES["image"]["name"]);
  $extension = $path_parts['extension'];
  
  $new_file_name = $current_id.'.'.$extension;
  $tname = $_FILES['image']['tmp_name'];
  $upload_dir = '../assets/heroes';
  move_uploaded_file($tname, $upload_dir.'/'.$new_file_name);
  print_r($_POST);
  
  $mysqli->query(
    "INSERT INTO heroes (name, type_id, image, description)
    VALUE('$name','$type','$new_file_name','$description')");
  header('Location: ../views/heroes.php');
}

if (isset($_POST['edit'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $mysqli->query(
    "UPDATE heroes 
    SET name='$name', type_id='$type',description='$description'
    WHERE id='$id'");
  header('Location: ../views/heroes.php');
}

if (isset($_GET['delete'])) {
  $id = $_GET['id'];
  $mysqli->query(
    "DELETE FROM heroes WHERE id='$id'");
  header('Location: ../views/heroes.php');
}
?>
