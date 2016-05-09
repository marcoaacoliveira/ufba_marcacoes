<?php
class User extends Model
{
    public function save(){
        $this->securePassword();
        parent::save();
    }
    private function securePassword() {
        $this->password = md5($this->password);
    }
}