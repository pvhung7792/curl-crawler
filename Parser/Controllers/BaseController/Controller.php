<?php

class Controller
{
    public function view($view, $_data = '' )
    {
        $data = $_data;
        require_once './Views/'.$view.'.php';
    }
}