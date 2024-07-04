<?php

class Validation{

    static function validate($data) {
        $errors = [];
        // email,firstname,lastname,gender,address,city,country
        if (empty( $data["email"])) {
            $errors["email"] = "Email is required!";
        }elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Email format is wrong!";
        }
        if (empty( $data["firstname"])) {
            $errors["firstname"] = "Firstname is required!";
        }
        if (empty( $data["lastname"])) {
            $errors["lastname"] =  "Lastname is required!";
        }
        if (empty( $data["gender"])) {
            $errors["gender"] =  "Gender is required!";
        }
        if (empty( $data["address"])) {
            $errors["address"] =  "Address is required!";
        }
        if (empty( $data["city"])) {
            $errors["city"] =  "City is required!";
        }
        if (empty( $data["country"])) {
            $errors["country"] =  "Country is required!";
        }

        return $errors;
    }
    static function validateSuccess($data) {
        // notification for removing and saving the data based on button
        $succsess = [];
        // email,firstname,lastname,gender,address,city,country
        if (isset($_POST['save'])) {
            $succsess["save"] = "Item Saved sccessfully!";
        }
        if (isset($_POST['delete'])) {
            $succsess["delete"] = "Item Deleted sccessfully!";
        }
        

        return $succsess;
    }
}

?>