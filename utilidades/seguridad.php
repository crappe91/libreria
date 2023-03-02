<?php

//LIMPIA CAMPOS DE LOS IMPUT
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

//VALIDA EL NOMBRE DEL REGISTRO
function validateName($name) {
    $_SESSION['error_nombre']= "";
    $name = test_input($name);
    $pattern = '/^(?=.*[A-Z])(?!.*[^a-zA-Z0-9]).{6,}$/'; //Minimo 6 caracteres, 1 mayuscula y no caracteres especiales
    $out = "";

    if (preg_match($pattern, $name)) {
        $out=$name;
    }
 
    return $out;
}

//VALIDA EMAIL DEL REGISTRO
function validateEmail($email){
    $_SESSION['error_email']= "";
    $email = test_input($email);
    $out = "";

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $out= $email;
    }
    return $out;
}

//VALIDA CONTRASEÑA
function validatePsw($psw){
    $_SESSION['error_psw']= "";
    $psw = test_input($psw);
    $pattern = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";
    $out = "";

    if (preg_match($pattern, $psw)) {
        $out= md5($psw);
    }
    
    return $out;
}

//DEVUELVE LA REPETICION DE LA CONTRASEÑA
function validatePsw2($psw2){

    $_SESSION['error_psw2']= "";
    $out = test_input($psw2);
    return md5($out);

}


?>