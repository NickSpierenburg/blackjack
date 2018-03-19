<?php

require_once('../includes/dbconnect.php');

$options = [
    'cost' => 12,
];

$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];

$username =  stripslashes($username);
$password = stripslashes($password);
$password2 = stripslashes($password2);

if($password == $password2) {
    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);
    
    $sql="SELECT * FROM users WHERE username='$username'";
    $result=mysqli_query($connect, $sql);
    $count=mysqli_num_rows($result);
    if($count == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $sqlInsert="INSERT INTO users (username, password) VALUES ('$username','$password')";
        $connect->query($sqlInsert);

        echo "<center>Registration succesful, you are now logged in! <a href='../index.php'>Login</a></center>";
    } else {
        echo "Username already in use!";
    }
}
else {
    echo "Passwords don't match!";
}

?>
