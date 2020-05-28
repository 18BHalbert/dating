<?php

class Validate
{
    function validFName($name){
        $name = str_replace(' ', '', $name);
        return !empty($name) && ctype_alpha($name);
    }

    function validLName($name){
        $name = str_replace(' ', '', $name);
        return !empty($name) && ctype_alpha($name);
    }

    function validAge($age){
        return ($age < 118 && $age > 18);
    }

    function validPhone($number){
        return (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $number));
    }

    function validEmail($email){
        return (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email));
    }

    function validOutdoor($outdoor){
        $outdoors = getOutInterests();
        return in_array($outdoor, $outdoors);
    }

    function validIndoor($indoor){
        $indoors = getOutInterests();
        return in_array($indoor, $indoors);
    }
}