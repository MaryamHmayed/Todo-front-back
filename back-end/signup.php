<?php
include("connection.php");

$username=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password'];

$check=$mysqli->prepare("SELECT email from users WHERE username=? OR email=?");
$check->bind_param("ss",$username,$email);
$check->execute();

$check->store_result();
$email_or_username_exist = $check->num_rows();

if ($email_or_username_exist == 0) {
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
    $query = $mysqli->prepare('insert into users(username,email,password) values(?,?,?)');
    $query->bind_param('sss',$username, $email, $hashed_password);
    $query->execute();

    $response['status'] = "success";
    $response['message'] = "another message in success";
} else {
    $response['status'] = "failed";
    $response['message'] = "another message in fail";
}


echo json_encode($response);