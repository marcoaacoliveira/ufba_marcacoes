<?php

class UserController extends Controller
{
    public function index()
    {
        $users = (new User())->findAll();
        echo $this->render(compact('users'));
    }
}