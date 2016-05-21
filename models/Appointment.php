<?php

class Appointment extends Model implements RedirectInterface{
    public function registrationRoute() {
        return '/appointment/create';
    }
    
    public function delete($id) {
        $sql = "DELETE FROM `{$this->table}` WHERE id='`{$id}`'";
        $sth = $this->connection->prepare($sql);
        return $sth->execute();
    }
}
