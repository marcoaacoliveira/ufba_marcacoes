<?php

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function create()
    {
        echo $this->render();
    }

    public function store()
    {
        $user = new User($this->request);
        if ($user->save()) {
            $_SESSION['message'] = "Usuário salvo com sucesso";
        }
        $this->redirect("/user/index");
    }

    public function index()
    {
        $users = $this->user->findAll();
        echo $this->render(compact('users'));
    }
}