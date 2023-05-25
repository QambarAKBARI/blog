<?php

namespace App\Controller;

use App\Service\Form;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class FormController extends AbstractController
{
    public function formContact()
    {
        if (Form::isSubmitted()) {
            $nom = Form::getData('nom', 'text');
            $entreprise = Form::getData('entreprise', 'text');
            $telephone = Form::getData('telephone', 'text');
            $message = Form::getData('message', 'text');
            $email = Form::getData('email', 'email');

            if ($nom && $entreprise && $telephone && $message && $email) {
                $mail = new PHPMailer(true);
                try {
                // Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host = 'localhost';                     // Set the SMTP server to send through
                // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                // $mail->Username   = 'user@example.com';                     //SMTP username
                // $mail->Password   = 'secret';                               //SMTP password
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port = 1025;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    $mail->CharSet = 'UTF-8';
                    // Recipients
                    $mail->setFrom('no-reply@site-blog.com', 'Site Blog');
                    $mail->addAddress('admin@site-blog.net', 'Admin');     // Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    // Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Formulaire de contact de site Blog';
                    $mail->Body = 'Nom : '.$nom.'<br>Entreprise : '.$entreprise.'<br>Téléphone : '.$telephone.'<br>Message : '.$message.'<br>Email : '.$email.'<br>';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    $this->addFlash('text-success', 'Votre message a bien été envoyé, merci de votre confiance '.$nom." ! Nous vous répondrons dans les plus brefs délais à l'adresse ".$email.' !');

                    return $this->render('form/success.php');
                } catch (Exception $e) {
                    $this->addFlash('text-danger', "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}");
                }
            }
        }
    }
}
