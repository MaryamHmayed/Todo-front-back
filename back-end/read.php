<?php
include('connection.php');

$user_id=$_POST["user_id"];




$query=$mysqli->prepare( "SELECT * FROM tasks WHERE user_id=?");
$query->bind_param('i',$user_id);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows();

if ($num_rows==0){
    $response['status'] ='cannot find task';
}else{
    $tasks=[];
    $query->bind_result($task_id,$description,$user_id);
    while ($query->fetch()){
        $task=[
            'task_id'=> $task_id,
            'description'=> $description,
            'user_id'=> $user_id

        ];
        $tasks[]= $task;
    }
    $response['status']='success';
    $response['tasks']='tasks';



}



echo json_encode($response);