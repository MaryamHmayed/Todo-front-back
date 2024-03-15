<?php
include('connection.php');


$user_id = $_POST["user_id"];
$task_id = $_POST["task_id"];
$new_description = $_POST["new_description"];



$query = $mysqli->prepare("update tasks set description=? where user_id=? and task_id=? ");
$query->bind_param('sii', $new_description,$user_id,$task_id); 
$query->execute();

if ($query->affected_rows > 0) {
    $response['status'] = 'success';
    $response['message'] = 'Task Updated';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to update task';
}

echo json_encode($response);