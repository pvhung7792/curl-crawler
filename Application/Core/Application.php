<?php
namespace Core;

/**
 * Class Application: Bootstrap class of the application
 * Read Url to get controller, action
 * Include required controller and use method base on action
 */

class Application
{
    private $url_controller;

    private $url_action;

    public function __construct()
    {
        if ($_GET == null){
            require_once './Application/Views/HomePage.php';
            die();
        }

        // get controller name
        $this->url_controller = $_GET['controller'];

        // get controller action(method)
        $this->url_action = $_GET['action'];

        // Include controller base on uri
        $controllerName = $this->url_controller.'Controller';

        require_once './Application/Controllers/'.$controllerName.'.php';

        //Call controller
        $controller = new $controllerName();

        //run controller action base on uri
        $action = $this->url_action;
        $param = isset($_POST)? $_POST : '' ;

        $controller->$action($param);
    }
}