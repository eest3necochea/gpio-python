<?php

$target_dir = dirname(__FILE__, 4) . '/uploads/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$pythonFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$route = false;


if (isset($_POST["submit"])) {
  //Check file type
  if ($pythonFileType == 'py') {
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
  } else {
    echo "File is not an python script.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

if ($uploadOk == 1) {
  try {
    //levanta el archivo subido y mete su contenido en el arreglo $data
    $readfile = fopen($target_file, "r") or die("Unable to open file!");
    while (!feof($readfile)) {
      $data[] = fgets($readfile);
    }
    fclose($readfile);
    //levanta el archivo que se utilizara para ejecutar en python
    //lo puebla con el contenido del arreglo $data
    $myfile = fopen($target_dir . "gpio.py", "w+") or die("Unable to open file!");
    foreach ($data as $value) {
      fputs($myfile, $value);
    }
    fclose($myfile);
    //borra el archivo subido
    unlink($target_file);
    $route = true;
  } catch (\Throwable $th) {
    throw $th;
  }
}
