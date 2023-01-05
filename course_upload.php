
<!DOCTYPE html>
<html>
 
<head>
    <title>Add Courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
img{
    margin: 5px;
    width: 362px;
    height: 300px;
}
    </style>
</head>
 
<body>

<div id="display-image">
 <?php


if (isset($_POST['upload'])) {
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./img/" . $filename;

    $name = $_POST["name"];
    $description = $_POST["description"];
 
    $db = mysqli_connect("localhost", "root", "", "gym");
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO courses (filename,name,description) VALUES ('$filename','$name','$description')";
 
    // Execute query
    mysqli_query($db, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Course uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload course!</h3>";
    }
 }

 $db = mysqli_connect("localhost", "root", "", "gym");
 $query = " select * from courses ";
 $result = mysqli_query($db, $query);

 while ($data = mysqli_fetch_assoc($result)) {
 ?>
     <img src="./img/<?php 
     echo $data['filename']; 
     ?>">
     <?php
     echo "<h5>" . $data['name'] . "<h5>";
     ?>
     <?php
     echo "<pre>" . $data['description'] . "</pre>";
     ?>
     <?php
     echo '<a href="contact.html">
      <input type="submit" value="Join Now"/>
      </a>';
      echo "<br><br>"
     ?>
   
 <?php
 }

 ?>
</div>
</body>
 
</html>