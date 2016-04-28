<?php

namespace Router;

class Router
{
    protected $controller;
    protected $action;
    protected $params=array();

    public function __construct(){
        $this->parseUri();
        $this->call();
    }

    /**
     * Verifica e constroi o nome do controlador
     * @param string $controller
     * @throws \Exception
     */
    protected function buildController($controller){
        $test_controller = ucfirst($controller)."Controller";
        if(!class_exists($test_controller)){
            throw new \Exception();
        }
        $this->controller = $test_controller;
    }

    /**
     * Verifica e constroi o nome do model
     * @param string $action
     * @throws \Exception
     */
    protected function buildAction($action){
        $reflect = new \ReflectionClass($this->controller);
        if(!$reflect->hasMethod($action)){
            throw new \Exception();
        }
        $this->action=$action;
    }

    /**
     * Constroi todos os outros parametros
     * @param $params
     */
    protected function buildParams($params){
        $this->params = $params;
    }

    /**
     * Faz um parser na URI e o transforma em Controlador, Action e Params
     * @throws \Exception
     */
    protected function parseUri(){
        $requests = explode('/',trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),'/'));
        $this->buildController($requests[0]);
        $this->buildAction($requests[1]);
        if(count($requests)>2){
            array_shift($requests);
            array_shift($requests);
            $this->buildParams($requests);
        }
    }

    /**
     * Faz uma chamada a função do Controller que representa a Action com os Params
     */
    public function call(){
        call_user_func_array(array($this->controller,$this->action), $this->params);
    }
}