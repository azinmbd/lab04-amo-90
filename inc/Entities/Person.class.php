<?php

class Person {
    // properties
    private string $email;
    private string $firstname;
    private string $lastname;
    private string $gender;
    private string $address;
    private string $city;
    private string $country;

    // getters
    public function getEmail() : string {
        return $this->email;
    }
    public function getFirstname() : string {
        return $this->firstname;
    }

    public function getLastname() : string {
        return $this->lastname;
    }
    public function getGender() : string {
        return $this->gender;
    }
    public function getAddress() : string {
        return $this->address;
    }
    public function getCity() : string {
        return $this->city;
    }
    public function getCountry() : string {
        return $this->country;
    }

    //setters
    public function setEmail(string $nEmail) {
        $this->email = $nEmail;
    }
    public function setFirstname(string $nFirstname) {
        $this->firstname = $nFirstname;
    }
    public function setLastname(string $nLastname) {
        $this->lastname = $nLastname;
    }    
    public function setGender(string $nGender) {
        $this->gender = $nGender;
    }
    public function setAddress(string $nAddress) {
        $this->address = $nAddress;
    }
    public function setCity(string $nCity) {
        $this->city = $nCity;
    }
    public function setCountry(string $nCountry) {
        $this->country = $nCountry;
    }
}

?>