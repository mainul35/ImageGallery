<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {

    private $id;
    private $fName;
    private $lName;
    private $email;
    private $password;

    function __construct($fName, $lName, $email, $password) {
        $this->email = $email;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getFName() {
        return $this->fName;
    }

    public function getLName() {
        return $this->lName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setFName($fName) {
        $this->fName = $fName;
    }

    public function setLName($lName) {
        $this->lName = $lName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

}
