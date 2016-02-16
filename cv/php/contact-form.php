<?php

$errors = array();

// Check if name has been entered
if (!isset($_POST['name'])) {
    $errors['name'] = 'Oups, Merci de saisir votre nom !';
}

// Check if lastname has been entered
if (!isset($_POST['lastname'])) {
    $errors['name'] = 'Oups, Merci de saisir votre prénom !';
}

// Check if lastname has been entered
if (!isset($_POST['phone'])) {
    $errors['phone'] = 'Oups, Merci de saisir votre numéro de téléphone !';
}

// Check if email has been entered and is valid
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Oups, Merci de saisir votre mail !';
}

//Check if message has been entered
if (!isset($_POST['massage'])) {
    $errors['message'] = 'Oups, Merci de saisir votre message !';
}

$errorOutput = '';

if(!empty($errors)){

    $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
    $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    $errorOutput  .= '<ul>';

    foreach ($errors as $key => $value) {
        $errorOutput .= '<li>'.$value.'</li>';
    }

    $errorOutput .= '</ul>';
    $errorOutput .= '</div>';

    echo $errorOutput;
    die();
}



$name = $_POST['name'];
$lastname = $_POST['lastname'];
$re = "/[0-9]/";
$str = "0675948525";

$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['massage'];
$from = $email;
$to = 'stephds01@gmail.com';  // please change this email id
$subject = 'Demande de renseignement : Formulaire de Contact CV de Stephanie DE SA';

$body = "From: $name\n Prenom: $lastname\n $phone\n E-Mail: $email\n Message:\n $message";

//send the email
$result = '';
if (mail ($to, $subject, $body)) {
    $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
    $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    $result .= 'Votre message est envoyé, je vous réponds très vite !';
    $result .= '</div>';

    echo $result;
    die();
}

$result = '';
$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
$result .= 'Oups, il y a eu un petit soucis, réessayer un peu plus tard !';
$result .= '</div>';

echo $result;
