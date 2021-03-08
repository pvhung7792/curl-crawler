<?php
/**
 * Class Controller defined base controller class
 */

namespace Core;

class Controller
{

    /**
     * @param string $view name of template file in Application/Views
     * @param array $_data data to transfer to view
     */

    public function view($view, $_data = [] )
    {
        $data = $_data;
        require_once './Application/Views/'.$view.'.php';
    }
}