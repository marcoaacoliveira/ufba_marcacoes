<?php

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->findAll();
        echo $this->render(compact('users'));
    }
}