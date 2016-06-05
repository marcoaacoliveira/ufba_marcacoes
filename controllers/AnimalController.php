<?php

class AnimalController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->animal = new Animal();
    }

    public function create($id)
    {
        var_dump($id);
        die();
        echo $this->render(compact('id'));
    }

    public function store($id)
    {/*
        $next = new $this->request['type']();
        unset($this->request['type']);
        $user = new User($this->request);
        if ($user->save()) {
            $_SESSION['message'] = "Usuário salvo com sucesso";
            return $this->redirect($next->registrationRoute());
        }
        return $this->redirect("/user/index");*/
    }

    public function index()
    {
        $animals = $this->animal->findAll();
        echo $this->render(compact('animals'));
    }
}