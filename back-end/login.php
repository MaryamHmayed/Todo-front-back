<?php
include("connection.php");

$username=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["password"];


$query = $mysqli->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$query->bind_param('ss',$username,$email);
$query->execute();

$query->store_result();
$query->bind_result($id,$username, $email, $hashed_password);
$query->fetch();

$num_rows = $query->num_rows();
if ($num_rows == 0) {
    $response['status'] = "user not found";
} else {
    if (password_verify($pass, $hashed_password)) {
        $response['status'] = 'logged in';
        $response['user_id'] = $id;
        $response['username'] = $username;
        $response['email']= $email;
    } else {
        $response['status'] = "wrong password";
    }
}
echo json_encode($response);
