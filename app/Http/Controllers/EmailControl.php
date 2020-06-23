<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailControl extends Controller
{
    public function _sendEmail($type, $email)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'mail.devours.org';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'noreply@devours.org';                     // SMTP username
            $mail->Password   = 'Dandi.129@';                               // SMTP password
            $mail->SMTPSecure = 'ssl';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('noreply@devours.org', 'Devours Demo');
            $mail->addAddress($email);     // Add a recipient           // Name is optional
        
            // // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            // Content
            if($type == "register")
            {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Aktifkan Akun Anda';
                $mail->Body    = '<h1>Email anda telah didaftarkan</h1><br/><a href="http://localhost:8000/akun/verifikasi/'.$email.'" >Aktifkan</a>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }else if($type == "block") 
            {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Akun Anda Dinonaktifkan';
                $mail->Body    = '<h1>Email anda telah dinonaktifkan</h1>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }else if($type == "aktif") {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Akun Anda Diaktifkan';
                $mail->Body    = '<h1>Email anda telah diaktifkan</h1>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }
            if($mail->send()){
                return true;
            }
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
