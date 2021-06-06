<?php 
//include connection file 
require_once('../includes/config.php');

//check login or not 
if(!$user->is_logged_in()){ header('Location: login.php'); }
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    
}

if(isset($_GET['delpost'])){ 

    $stmt = $db->prepare('DELETE FROM techno_blog WHERE articleId = :articleId') ;
    $stmt->execute(array(':articleId' => $_GET['delpost']));

    header('Location: index.php?action=deleted');
    exit;
} 

?>
