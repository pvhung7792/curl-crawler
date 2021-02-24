<?php 
class route
{
    private $action;
    private $controller;

    public function __construct($controller, $action, $data = '')
    {   
        $this->controller = $controller;
        $this->action = $action;
    }

    public function excecute()
    {
        
        // Call controller base on uri
        $controllerName = $this->controller.'Controller';
        
        require_once './Controllers/'.$controllerName.'.php';
        $controller = new $controllerName();
        //run controller action base on uri
        $action = $this->action;
        $controller->$action();
        
    }
}

?>