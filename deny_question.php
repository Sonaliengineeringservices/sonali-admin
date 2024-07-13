<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$dny_id = filter_input(INPUT_POST, 'dny_id');
if ($dny_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	// if($_SESSION['admin_type']!='super'){
	// 	$_SESSION['failure'] = "You don't have permission to perform this action";
    // 	header('location: customers.php');
    //     exit;

	// }
    $question_id = $dny_id;
    $data_to_update['appr_deny'] = "0";
    
    $db = getDbInstance();
    $db->where('id', $question_id);
    // $status = $db->delete('questions');
    $status = $db->update('questions', $data_to_update);
   
    if ($status) 
    {
        $_SESSION['info'] = "question deny successfully!";
        header('location: questions.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to deny question";
    	header('location: questions.php');
        exit;

    }
    
}