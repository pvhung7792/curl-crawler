<?php


class Application
{
    private $url_controller;

    private $url_action;

    public function __construct()
    {
        $this->url_controller = $_GET['controller'];
        $this->url_action = $_GET['action'];

        // Call controller base on uri
        $controllerName = $this->url_controller.'Controller';
        require_once '../Application/Controllers/'.$controllerName.'.php';

        $controller = new $controllerName();

        //run controller action base on uri
        $action = $this->url_action;

        $controller->$action();
    }
}