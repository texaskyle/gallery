<?php
// check if the upload button has been clicked
if(isset($_POST['uploadFile'])) {
    // taking the file details of the file that we about to upload
    $file = $_FILES['file'];

    $filename  = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $filerror = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];

    // telling the php from where we want to take the extension from
    $fileExt = explode('.', $filename);
    $fileActualExtension = strtolower(end($fileExt));

    // creating an array for only the allowed files
    $allowed = array('jpg', 'png', 'pdf', 'peng');

    if (in_array($fileActualExtension, $allowed)) {
        
        // checking the file error
        if ($filerror === 0) {
            
            // checking the file size
            if ($filesize < 5000000) {
                // giving the file a new name so that we can make it unique 
                // true here is the microseconds when the file was being uploaded
                $newFilename = uniqid('', true) . "." . $fileActualExtension;
                // destination of the file
                $newfileDestnation = 'uploads/'.$newFilename;

                // moving the uploaded file with the below function
                move_uploaded_file($fileTmpname, $newfileDestnation);
                header("Location:index.php?upload=success");
             }else {
                echo "This type of file is too big to be uploaded";
            } 
        }else {
            echo "There was an error in uploading the file!!";
        }
    }else {
        echo "cannot upload this type of files!!";
    }
}else{
    echo "Click the upload button";
}
