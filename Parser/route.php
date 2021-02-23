<?php 
class route
{
    private $action;
    private $controller;

    public function __construct($controller, $action)
    {   
        $this->controller = $controller;
        $this->action = $action;
    }

    public function excecute()
    {
        $controllerName = $this->controller.'Controller';
        require_once './Controllers/'.$controllerName.'.php';
        $controller = new $controllerName();
        $action = $this->action;
        $controller->$action();
    }
}

?>