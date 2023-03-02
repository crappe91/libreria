<?php
session_start();
include '../utilidades/seguridad.php';
include '../utilidades/bd.php';


// define variables and set to empty values
$nombre = $email = $psw = $pswRepeat = $direccion = "";
$correcto = true;

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

//validando nombre

    if(isset($_POST["nombre"])){    
        $nombre = validateName($_POST["nombre"]);
        if($nombre != ""){
            $_SESSION['error_nombre']= "";
            $_SESSION['nombre'] = $nombre;
        }else{
            $correcto = false;
            $_SESSION['nombre'] = "";
            $_SESSION['error_nombre']= "El nombre introducido es incorrecto.<br><br>";
        };
    }

//validando email

    if(isset($_POST["email"])){
        $email = validateEmail($_POST["email"]);
        if($email != ""){
            $_SESSION['error_email']= "";
            $_SESSION['email'] = $email;
        }else{
            $correcto = false;
            $_SESSION['email'] = "";
            $_SESSION['error_email']= "El email introducido es incorrecto.<br><br>";
        };
    }

//validando psw

if(isset($_POST["psw"])){
    $psw = validatePsw($_POST["psw"]);
    $psw2 = validatePsw2($_POST["psw2"]);
    if($psw != ""){
        $_SESSION['error_psw']= "";
        
        if(isset($_POST["psw2"])){
            $_SESSION['error_psw2']= "";
            if ($psw === $psw2){
                $_SESSION['psw'] = $psw;
            }else{
            $correcto = false;
            $_SESSION['error_psw2']= "Las contraseñas no coinciden.<br><br>";
            }
        }
        }else{
            $correcto = false;
            $_SESSION['error_psw']= "La contraseña es incorrecta.<br><br>";
            $_SESSION['psw'] = "";
        };
}

if(isset($_POST["direccion"])){
    $direccion = test_input($_POST["direccion"]);
    $_SESSION['direccion'] =  $direccion;
}else{
    $correcto = false;
    $_SESSION['error_direccion']= "Introduzca una dirección.<br><br>";
    $_SESSION['direccion'] = "";
}


//Creo sesión con los post

if ($correcto) {
    insertarBd($nombre, $email, $psw, $direccion);

    header("Location: index.php");
    exit();
} else {
    header("Location: registro.php");
}
}
?>
 