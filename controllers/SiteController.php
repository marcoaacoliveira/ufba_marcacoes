<?php

class SiteController extends Controller
{
    public function home()
    {
        session_start();
        echo $this->render();
    }
}