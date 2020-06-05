<?php

class Member{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    public function __construct()
    {

    }

    public function Member($fname, $lname, $age, $gender, $phone){
        $this->setFname($fname);
        $this->setLname($lname);
        $this->setAge($age);
        $this->setGender($gender);
        $this->setPhone($phone);
    }

    function setFname($name){
        $this->_fname = $name;
    }

    function getFname(){
        return $this->_fname;
    }

    function setLname($name){
        $this->_lname = $name;
    }

    function getLname(){
        return $this->_lname;
    }

    function setAge($age){
        $this->_age = $age;
    }

    function getAge(){
        return $this->_age;
    }

    function setGender($gender){
        $this->_gender = $gender;
    }

    function getGender(){
        return $this->_gender;
    }

    function setPhone($phone){
        $this->_phone = $phone;
    }

    function getPhone(){
        return $this->_phone;
    }

    function setEmail($email){
        $this->_email = $email;
    }

    function getEmail(){
        return $this->_email;
    }

    function setState($state){
        $this->_state = $state;
    }

    function getState(){
        return $this->_state;
    }

    function setSeeking($seeking){
        $this->_seeking = $seeking;
    }

    function getSeeking(){
        return $this->_seeking;
    }

    function setBio($bio){
        $this->_bio = $bio;
    }

    function getBio(){
        return $this->_bio;
    }
}