 <?php
/* include_once 'imageUpload.dbh.php';
if (isset($_POST['submitRegister'])) {
    # code...
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$sql= "INSERT INTO users (firstname, lastname, username, pwd) VALUES('$fname', '$lname', '$username', '$pwd');";
$result_run = mysqli_query($conn, $sql);

// runing another sql to eliminate as many error as possible
$query = "SELECT * FROM users WHERE firstname='$fname' AND username='$username';";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $userid = $row['id']; //id from the user's table
        $sql= "INSERT INTO profileimg(userid, status) VALUES('$userid', 1);";
        $results = mysqli_query($conn, $query);
        echo "successful signup";
        header("Location: index.php?signup =success");
    }
    
}else{
    echo "You have an eror when signing up";
}
}else{
    echo "click the signup button";
}  */




 include_once 'imageUpload.dbh.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    $sql = "INSERT INTO users (firstname, lastname, username, pwd) VALUES('$fname', '$lname', '$username', '$pwd');";
    $result_run = mysqli_query($conn, $sql);


// here we now select the matching data which we have inserted and the one on the database
    $query = "SELECT * FROM users WHERE firstname='$fname' AND username='$username';";
    $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $userid = $row['id']; //id from the user's table
                $sql = "INSERT INTO profileimg(userid, status) VALUES('$userid', 1);";
                $results = mysqli_query($conn, $sql);
                echo "successful signup";
                header("Location: index.php?signup =success");
            }

}else {
    echo "You have an error!!";
} 
?>
?> 