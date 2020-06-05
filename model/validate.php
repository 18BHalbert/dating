<?php

function validFName($name){
    $name = str_replace(' ', '', $name);
    return !empty($name) && ctype_alpha($name);
}//

function validLName($name){
    $name = str_replace(' ', '', $name);
    return !empty($name) && ctype_alpha($name);
}

function validAge($age){
    $age = str_replace(' ', '', $age);
    return ($age < 118 && $age > 18);
}

function validPhone($number){
    $number = str_replace('-', '', $number);
    return (!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $number));
}

function validEmail($email){
    $email = str_replace(' ', '', $email);
    return !empty($email) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) != false;
}

function validOutdoor($outdoor){
    $outdoors = getOutInterests();
    return in_array($outdoor, $outdoors);
}

function validIndoor($indoor){
    $indoors = getOutInterests();
    return in_array($indoor, $indoors);
}