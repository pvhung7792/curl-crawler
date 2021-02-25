<?php 
// require_once './Models/BaseModel/Parser.php';
require_once './Config/Config.php';
require_once './route.php';

//redirect back if no data input
if(!$_GET['action']){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

//create router get uri to pass on router
$route = new route($_GET['controller'], $_GET['action'], $_POST);
$route->excecute();

?>
