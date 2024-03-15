<?php
include('connection.php');


$user_id = $_POST["user_id"];
$description = $_POST["description"]; 


$query = $mysqli->prepare("INSERT INTO tasks (description, user_id) VALUES (?, ?)");
$query->bind_param('si', $description, $user_id); 
$query->execute();

if ($query) {
    $response['status'] = 'success';
    $response['message'] = 'Task created successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to create task';
}

echo json_encode($response);