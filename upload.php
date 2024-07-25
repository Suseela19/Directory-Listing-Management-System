<?php
$target_directory = "uploads/";
$target_file = $target_directory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (optional, example max file size 5MB)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats (optional, example allow only pdf and txt files)
if($imageFileType != "pdf" && $imageFileType != "txt" ) {
    echo "Sorry, only PDF & text files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    die file. two into ه So 
 in
