<?php

class SiteController extends Controller
{
    public function home()
    {
        session_start();
        if(!isset($_SESSION['login'])){
            header("Location: /user/login");
        }
        echo $this->render();
    }
}