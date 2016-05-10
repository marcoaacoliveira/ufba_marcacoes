<?php

class Controller
{
    public function __construct()
    {
        $this->request = [];
        if (isset($_POST) && !empty($_POST)) {
            $this->request = array_merge($this->request, $_POST);
        }
    }

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

    public function redirect($to)
    {
        header("Location: $to");
    }
}