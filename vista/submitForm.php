<?php 
/* 
Author: Alberto Moyano Sánchez 
Date: 2009-05-24 

Description: 
- The script receives some data with method="post". 
- One of this data may be a path of an image that was previously uploaded 
  to a temporary directory in the server. If this datum exists, the script 
  move the image from the temporary directory to a final one. 
- The script process the rest of the data and produces some output.  
*/ 
$pathToMove = "../uploads/"; 

$imagePathParameterName = "uploadedImagePath"; 
$imageDescriptionParameterName = "imageDescription"; 

$imagePath = $_POST[$imagePathParameterName]; 

$description = $_POST[$imageDescriptionParameterName]; 

// the funtion file_exists doesn't find files whose name has special 
// characters, like tildes 
if (($imagePath != null) && (file_exists($imagePath))) { 

  //$imagePathToMove = $pathToMove . basename($imagePath); 
  $info=pathinfo($imagePath);

  $imagePathToMove = $pathToMove .'prueba1.'.$info['extension'];
  if(file_exists($imagePathToMove)) { 
    unlink($imagePathToMove); 
  } 
  if(rename($imagePath, $imagePathToMove)) { 
    echo "The image " . $imagePathToMove . " was stored with the description '" . $description . "'."; 
  } 
  else { 
    echo "There was an error moving the file " . $imagePath . " to " . $imagePathToMove; 
  } 
} 
else { 
  echo "No image was uploaded for the description '" . $description . "'."; 
} 
?>