<?php
session_start();
include_once 'imageUpload.dbh.php';
$sessionid = $_SESSION['id'];

// the name of the image which the user has uploaded in the uploads folder
$filename = "uploads/profile". $sessionid."*";
// glob is a function in php that goes in and searches the file which has the name am looking for
$fileInfo = glob($filename); //it is an array
$fileext = explode(".", $fileInfo[0]);
$fileactualext = $fileext[1];


// getting the file now the full extension without *
$file =
"uploads/profile".$sessionid.".". $fileactualext;
print_r($file);

// the unlink function deletes the file that has been uploaded
if (!unlink($file)) {
    echo "Unable to delete the  file";
}else{
    echo "The file was successfully deleted";
}

// an sql statement to set the status and as false because the profile image has been delete and  the picture no longer exist thus the pic default will be the one being inserted

$sql = "UPDATE profileimg SET status = 1 WHERE userid = '$sessionid';";
mysqli_query($conn, $sql);
header("Location: index.php?deletesuccess");

?>