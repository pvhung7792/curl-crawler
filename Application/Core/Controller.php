<?php

class Controller
{
    public function view($view, $_data = '' )
    {
        $data = $_data;
        require_once '../Application/Views/'.$view.'.php';
    }
}