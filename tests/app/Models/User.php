<?php

namespace App\Models;
class User{
    public $first_Name;
    public $lastName;
    public $email;
    public function setFirstName($first_Name){
        $this->first_Name = trim($first_Name);

    }


    public function getFirstName(){
        return 'Billy';
    }

    public function setLastName($lastName){
        $this->lastName = trim($lastName);

    }
    public function getlastName(){
        return 'marcer';
    }

    public function getFullName($lastName){
        return $this->first_name. ''. $this->last_name;

    }
    public function setEmail(){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }



    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail(),
        ];
    }
}
