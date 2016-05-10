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

    public function login()
    {
        session_start();
        echo $this->render();
    }

    public function auth()
    {
        session_start();
        if ((issetAndNotEmpty($this->request['login'])) && issetAndNotEmpty($this->request['password'])) {
            if ($user = $this->user->findBy('login', $this->request['login'])) {
                if ($user->verifyPassword($this->request['password'])) {
                    $_SESSION['log'] = "Login realizado com sucesso";
                    $_SESSION['user'] = $user->login;
                    return $this->redirect("/site/home");
                } else {
                    $_SESSION['log'] = "Login ou senha incorreto";
                }
            }
        } else {
            $_SESSION['log'] = "Preencha login e senha";
        }
        return $this->redirect("/user/login");
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