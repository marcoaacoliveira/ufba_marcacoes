<?php

class Controller
{
    public function render($action,$className,$data=array()){
        extract($data);
        ob_start();
        include(dirname(dirname(__FILE__))."/views/$className/$action.php");
        $template = ob_get_clean();
        return $template;
    }
}