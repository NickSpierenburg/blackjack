<?php


require_once('../includes/credentials.php');
session_start();
credential();


$options = [
    'cost' => 12,
];

$username=$_POST['username'];
$password=$_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);

$sql="SELECT * FROM users WHERE username='$username'";
$result=mysqli_query($connect, $sql);
$count=mysqli_num_rows($result);

if($count==1){
    while($row = mysqli_fetch_array( $result )) {
        $hash = $row['password'];
        if(password_verify($password,$hash)) {
            $_SESSION['user'] = $username;
            $_SESSION['credit'] = $row['credit'];
    	    $_SESSION['userid'] = $row['id'];
    	    header("location:../index.php");
        } else {
            echo "WRONG PASSWORD!";
        }
    }
}
else {
    echo "USERNAME NOT FOUND!";
}

?>
