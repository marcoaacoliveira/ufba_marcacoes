<?php

class AppointmentController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->appointment = new Appointment();
    }
    
    public function create() {
        echo $this->render();
    }
    
    public function store() {
        $next = new $this->request['type']();
        unset($this->request['type']());
        $appointment = new Appointment($this->request);
        if ($appointment->save()) {
            $_SESSION['message'] = "Consulta marcada com sucesso!";
            return $this->redirect($next->registrationRoute());
        }
        return $this->redirect("/user/index");
    }
    
    public function cancel($id){
        $next = new $this->request['type']();
        unset($this->request['type']());
        $appointment = new Appointment($this->request);
        if ($appointment->delete($id)) {
            $_SESSION['message'] = "Consulta desmarcada com sucesso!";
            return $this->redirect($nest->registrationRoute());
        }
        return $this->redirect("/user/index");
    }
    
    public function remark($id) {
        $next = new $this->request['type']();
        unset($this->request['type']());
        $appointment = new Appointment($this->request);
        if ($appointment->delete($id)) {
            return $this->redirect($this->registrationRoute());
        }
        return $this->redirect("/user/index");
    }
}

