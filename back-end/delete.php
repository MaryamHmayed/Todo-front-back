<?php
include('connection.php');


$user_id = $_POST["user_id"];
$task_id = $_POST["task_id"];



$query = $mysqli->prepare("delete from tasks where user_id=? and task_id=? ");
$query->bind_param('ii', $user_id,$task_id); 
$query->execute();

if ($query->affected_rows > 0) {
    $response['status'] = 'success';
    $response['message'] = 'Task deleted successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to delete task';
}

echo json_encode($response);