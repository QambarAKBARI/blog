<?php

namespace App\Controller;

use App\Service\Form;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * FormController
 * 
 * @category Controller
 * @package  None
 * @link     None
 */
class FormController extends AbstractController
{
    /**
     * Traitement formulaire de contact
     * 
     * @return [type]
     */
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
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
                    $mail->isSMTP();                                         
                    $mail->Host = 'localhost';                
                    // $mail->SMTPAuth   = true;                          
                    // $mail->Username   = 'user@example.com';                    
                    // $mail->Password   = 'secret';                             
                    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
                    $mail->Port = 1025;                                   
                    $mail->CharSet = 'UTF-8';
                    // Recipients
                    $mail->setFrom('no-reply@site-blog.com', 'Site Blog');
                    $mail->addAddress('admin@site-blog.net', 'Admin');   
                    // $mail->addAddress('ellen@example.com');               
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    // Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');      
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

                    // Content
                    $mail->isHTML(true);                          
                    $mail->Subject = 'Formulaire de contact de site Blog';
                    $mail->Body = 'Nom : '.$nom.'<br>Entreprise : '.$entreprise.'<br>Téléphone : '.$telephone.'<br>Message : '.$message.'<br>Email : '.$email.'<br>';
                 

                    $mail->send();
                    $this->addFlash('text-success', 'Votre message a bien été envoyé, merci de votre confiance '.$nom." ! Nous vous répondrons dans les plus brefs délais à l'adresse ".$email.' !');

                    return $this->render('form/success.php');
                } catch (Exception $e) {
                    $this->addFlash('text-danger', "Le message  envoyé. {$mail->ErrorInfo}");
                }
            }
        }
    }
}
