<?php 
// require_once './Models/BaseModel/Parser.php';

require_once './route.php';

//start session
session_start();

//redirect back if no data input
if(!$_POST['url'] || !$_GET['action']){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

//creat router get uri to pass on router
$route = new route($_GET['controller'], $_GET['action'], $_POST);
$route->excecute();

?>
