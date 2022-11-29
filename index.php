<?php
session_start();
include_once 'imageUpload.dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $sql = "SELECT * FROM users";
    $sql_run = mysqli_query($conn, $sql);

    // condition to check if there are users in the database
    if (mysqli_num_rows($sql_run) > 0) {
        while ($row = mysqli_fetch_assoc($sql_run)) {
            // now am using the profile image table to check if the user the really have uploaded a profile image
            $id = $row['id'];
            $useranme = $row['username'];
            //taking the id of the user in the users table and giving it a variable
            // an sql statement to that checks where an image has been uploaded or not
            $sqlImage = "SELECT * FROM profileimg WHERE userid='$id';";
            $resultsProfileImage = mysqli_query($conn, $sqlImage);
            

            if ($resultsProfileImage) {
                while ($rowImg = mysqli_fetch_assoc($resultsProfileImage)) {
                    echo "<div>";
                    if ($rowImg['status'] == 0) {
                        echo "<img src='uploads/profile.'$id'.jfif' alt='this is the profile picture that you uploaded'>";
                    } else {
                        echo "<img src='uploads/profileDefault.jfif' alt='this is the default profile picture'>";
                    }
                    echo "</div>";
                    echo $row['username']; echo"<br>";
                }
            }else{
                echo "cannot find an id or userid in the profile image table";
            }
            
        }
    } else {
        echo "There are no users in the  database <br>";
    }


    if (isset($_SESSION['id'])) {
        if ($_SESSION['id'] == 1) {
            echo "You are logged as user number 1";
        }
        echo "<form action='upload.php' method='POST' enctype='multipart/form-data'>
        <input type='file' name='file'>
        <br><br>
        <button type='submit' name='uploadFile'>Upload</button>
    </form>";
    } else {
        echo "you are not looged in!";
        echo "<form action='register.php' method='POST'>
        <input type='text' name='fname' placeholder='First name'>
        <input type='text' name='lname' placeholder='Last name'>
        <input type='text' name='username' placeholder='username'>
        <input type='password' name='pwd' placeholder='password'>
        <button type='submit' name='submitRegister'>Signup</button>
    </form>";
    }

    ?>


    <p>login as the user</p>
    <form action="login.php" method="POST">
        <button type="submit" name="loginSubmit">login</button>
    </form>

    <p>login out</p>
    <form action="logout.php" method="POST">
        <button type="submit" name="logoutSubmit">logout</button>
    </form>

    <!-- <img src='uploads/profileDefault.jfif' alt='this is the default profile picture'> -->
</body>

</html>