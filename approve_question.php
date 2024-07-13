<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$appr_id = filter_input(INPUT_POST, 'appr_id');
if ($appr_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	// if($_SESSION['admin_type']!='super'){
	// 	$_SESSION['failure'] = "You don't have permission to perform this action";
    // 	header('location: customers.php');
    //     exit;

	// }
    $question_id = $appr_id;
    $data_to_update['appr_deny'] = "1";
    echo $data_to_update['status'];
    $db = getDbInstance();
    $db->where('id', $question_id);
    // $status = $db->delete('questions');
    $status = $db->update('questions', $data_to_update);
   
    if ($status) 
    {
        $_SESSION['info'] = "Question approved successfully!";
        header('location: questions.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to Approve question";
    	header('location: questions.php');
        exit;

    }
    
}