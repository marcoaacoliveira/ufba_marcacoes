<?php

class Doctor extends Model implements RedirectInterface
{
    public function registrationRoute(){
        return '/doctor/create';
    }
}