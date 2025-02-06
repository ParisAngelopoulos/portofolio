<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Serverinstellingen
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'parisangelopoulos@gmail.com'; // ⚠️ JOUW GMAIL HIER
    $mail->Password   = 'xuyf btfu wnfo ihed'; // ⚠️ Speciaal app-wachtwoord nodig!
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Formuliergegevens ophalen
    $naam = htmlspecialchars($_POST['naam']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $onderwerp = htmlspecialchars($_POST['onderwerp']);
    $bericht = nl2br(htmlspecialchars($_POST['bericht']));

    // Controleer of het e-mailadres geldig is
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.php?status=error&message=" . urlencode("Ongeldig e-mailadres"));
        exit();
    }

    // E-mailinstellingen
    $mail->setFrom('parisangelopoulos@gmail.com', 'Paris Angelopoulos'); // Moet een geverifieerd e-mailadres zijn
    $mail->addAddress('parisangelopoulos@gmail.com', 'Ontvanger Naam'); // Ontvanger instellen
    $mail->addReplyTo($email, $naam); // Ingevoerde e-mail gebruiken als Reply-To

    // Inhoud van de e-mail
    $mail->isHTML(true);
    $mail->Subject = "Nieuw bericht van $naam - $onderwerp";
    $mail->Body    = "
        <h2>Nieuw bericht van $naam</h2>
        <p><strong>Afzender:</strong> $email</p>
        <p><strong>Onderwerp:</strong> $onderwerp</p>
        <p><strong>Bericht:</strong></p>
        <p>$bericht</p>
    ";

    $mail->send();

    // Redirect terug naar contactpagina met succesbericht
    header("Location: contact.php?status=success");
    exit();
} catch (Exception $e) {
    // Redirect terug met foutmelding
    header("Location: contact.php?status=error&message=" . urlencode($mail->ErrorInfo));
    exit();
}
?>
