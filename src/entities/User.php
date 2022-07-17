<?php

class User {
    private $id;
    private $name;
    private $last_name;
    private $email;
    private $password;
    private $created_at;
    private $is_active;

    public function __construct($id, $name, $last_name, $email, $password, $created_at, $is_active) {
        $this->id = $id;
        $this->name = $name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->is_active = $is_active;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }

}