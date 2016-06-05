<?php

class DoctorController extends Controller
{
    public function create($id)
    {
        echo $this->render(compact('id'));
    }
}