<?php
require 'PHPMailerAutoload.php';
            require 'credential.php';

            $mail = new PHPMailer;

             //$mail->SMTPDebug = 4;                               // Enable verbose debug output
            $to='tanaypatil36@gmail.com';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(EMAIL, 'Tanay_portfolio');
            $mail->addAddress($to);     // Add a recipient

            $mail->addReplyTo(EMAIL);
            // print_r($_FILES['file']); exit;
           
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $_POST['email'];
            $mail->Body    = '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
            $mail->Body    = $_POST['message'];
            $mail->AltBody = $_POST['message'];

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo '<p style="color:green;">Message has been sent';
            }
?>