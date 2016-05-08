<?php

class Controller
{
    public function render($data = array())
    {
        $className = $this->getModelName();
        $action = debug_backtrace()[1]['function'];
        extract($data);
        ob_start();
        include(dirname(dirname(__FILE__)) . "/views/$className/$action.php");
        $template = ob_get_clean();
        return $template;
    }

    public function getModelName()
    {
        return str_replace('Controller', '', get_class($this));
    }
}