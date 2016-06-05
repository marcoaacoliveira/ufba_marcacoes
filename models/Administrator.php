<?php

class Administrator extends Model implements RedirectInterface
{
    public function registrationRoute(){
        return '/administrator/create';
    }
}