<?php

class Appointment extends Model implements RedirectInterface{
    public function registrationRoute() {
        return '/appointment/create';
    }

}
