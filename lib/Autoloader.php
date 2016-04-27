<?php
namespace Autoloader;


class Autoloader
{
    function __construct()
    {
        spl_autoload_register(array($this, 'verifyClass'));
    }

    protected function autoload($path)
    {
        if (is_readable(dirname(dirname(__FILE__))."/".$path)) {
            require(dirname(dirname(__FILE__))."/$path");
        }
    }

    protected function verifyClass($className)
    {
        if (strstr($className, "Controller")!=false) {
            $this->autoload('controllers/' . $className . '.php');
        } else {
            $this->autoload('models/' . $className . '.php');
        }
    }
}
