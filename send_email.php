<?php
$naam = $_POST['naam'];
$email = $_POST['email'];
$onderwerp = $_POST['onderwerp'];
$bericht = $_POST['bericht'];

$ontvanger_email = 'parisangelopoulos@gmail.com';

$ontvanger = $ontvanger_email;
$subject = "Bericht van $naam: $onderwerp";
$message = "Naam: $naam\n";
$message .= "E-mailadres: $email\n";
$message .= "Bericht:\n$bericht";

$mail = mail($ontvanger, $subject, $message);

if ($mail) {
    echo "<h3>Bericht succesvol verzonden!</h3>";
} else {
    echo "<h3>Er is een fout opgetreden. Probeer het later opnieuw.</h3>";
}
?>