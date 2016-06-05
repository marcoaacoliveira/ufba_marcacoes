<?php

class Client extends Model implements RedirectInterface
{
    public function registrationRoute(){
        return '/client/store';
    }

}