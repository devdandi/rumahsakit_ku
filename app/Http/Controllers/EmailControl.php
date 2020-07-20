<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailControl extends Controller
{
    public function _sendEmail($type, $email, $no_antrian = null, $dokter = null, $nama = null, $keluhan = null, $pesan = null, $telepon=null, $date=null)
    {
        $data = array();
        $data['nama'] = $nama;
        $data['dokter'] = $dokter;
        $data['telepon'] = $telepon;
        $data['pesan'] = $pesan;
        $data['keluhan'] = $keluhan;
        $data['date'] = $date;
        $data['no_antrian'] = $no_antrian;
        $data['email'] = $email;

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
            }else if($type == "reset") {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body    = "<p>Password sementara anda: D897438LKDAJDAN". 
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }else if($type == "daftar-online") {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Detail perjanjian dengan dokter';
                $mail->Body    = view('email',['data' => $data]);
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }else if($type == "terima-janji") {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Perjanjian dengan dokter disetujui';
                $mail->Body    = view('email-terima',['data' => $data]);
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }else if($type == "tolak-janji-without-date") {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Perjanjian dengan dokter ditolak tanpa penjadwalan ulang';
                $mail->Body    = view('email-tolak-WOdate',['data' => $data]);
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }else if($type == "tolak-with-date") {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Perjanjian dengan dokter ditolak dengan penjadwalan ulang';
                $mail->Body    = view('email-tolak-date',['data' => $data]);
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }else if($type == "antrian") {
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Detail Antrian Anda';
                $mail->Body    = view('email-antrian',['antrian' => $no_antrian]);
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            }
            if($mail->send()){
                return true;
            }
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function sendAntrian($email, $hasil)
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
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Detail Antrian Anda';
            $mail->Body    = view('email-antrian',['antrian' => $hasil]);
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send()){
                return true;
            }
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
