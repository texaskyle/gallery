<?php
// setting up the session
session_start();

if (isset($_POST['loginSubmit'])) {
    // setting the session id as one so that we can be logged in as user number one, session is a super global variable.
    $_SESSION['id'] = 1;
    header("Location: index.php");
}else{
    echo "click the login button";
}