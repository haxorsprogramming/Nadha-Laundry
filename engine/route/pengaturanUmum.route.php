<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'lib/phpmailer/library/PHPMailer.php';
require_once 'lib/phpmailer/library/Exception.php';
require_once 'lib/phpmailer/library/OAuth.php';
require_once 'lib/phpmailer/library/POP3.php';
require_once 'lib/phpmailer/library/SMTP.php';

class pengaturanUmum extends Route{

   public function __construct()
   {
        $this -> st = new state;
   }

    public function index()
    {
        $this -> bind('dasbor/pengaturanUmum/pengaturanUmum');
    }

    public function tesKirimPesan()
    {
        

        $mail = new PHPMailer(true);  
        // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'haxorsuinsu@gmail.com';                 // SMTP username
            $mail->Password = 'python2019!';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('haxorsuinsu@gmail.com', 'Haxors Uinsu');
            $mail->addAddress('alditha.forum@gmail.com', 'Joe User');     // Add a recipient
            
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Status Cucian';
            $mail->Body    = 'Halo, cucian anda telah selesai .. terima kasih .. :)';
            $mail->AltBody = 'Halo, cucian anda telah selesai .. terima kasih .. :)';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

}