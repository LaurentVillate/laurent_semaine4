<?php
var_dump($_FILES);
$extension = substr(strrchr($_FILES["fichier"]["name"], "."), 1);

if (sizeof($_FILES["fichier"]["error"]) >0)
{ 
    switch(sizeof($_FILES["fichier"]["error"])){
    case 1: 
        echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
        break; 
    case 2: 
        echo "The uploaded file was only partially uploaded"; 
        break; 
    case 3: 
        $message = "No file was uploaded"; 
        break; 
    case 4: 
        $message = "Missing a temporary folder"; 
        break; 
    case 5: 
        $message = "Failed to write file to disk"; 
        break; 
    case 6: 
        $message = "File upload stopped by extension"; 
        break; 

    default: 
        $message = "Unknown upload error"; 
        break; 
    }
} 
else{
    // On met les types autorisés dans un tableau (ici pour une image)
$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On extrait le type du fichier via l'extension FILE_INFO 
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
finfo_close($finfo);

if (in_array($mimetype, $aMimeTypes))
{
    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */
       move_uploaded_file($_FILES["photo"]["tmp_name"], "src/img/photo.jpg");
} 
else 
{
   // Le type n'est pas autorisé, donc ERREUR

   echo "Type de fichier non autorisé";    
   exit;
}    
}
?>