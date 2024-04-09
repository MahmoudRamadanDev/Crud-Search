<?php
// check string length
$success = '';
$error = '';
function requireInput ($str) {
    if (strlen($str) > 0) {
        return true;
    } else {
        return false;
    }
}
// check string length 

function minInput ($value , $min) {
    if (strlen($value) < $min ) {
        return false;
    } else {
        return  true ;
    }
}

// check password length

function maxInput($value, $max)
{
    if (strlen($value) > $max) {
        return false;
    } else {
        return true ;
    }
}

// santize string 

function santizeInput($value) {
    $value = trim($value);
    $value = filter_var($value , FILTER_SANITIZE_STRING);
    return $value;
}

// santize email address 

function santizeEmail($email) {
    $email = trim($email);
    $email = filter_var($email , FILTER_SANITIZE_EMAIL);
    return $email;
}


// validate email address

function validEmail($email) { 
    if (filter_var($email , FILTER_VALIDATE_EMAIL)) {
        return true;
    }else {
        return false;
    }
}