<?php


namespace App\Shared\Utility;


use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Psr\Log\LoggerInterface;

class EmailUtil
{
    private LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function sendEmail(string $to, string $toName, string $subject, string $body) {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->Host       = 'mail.pethotelshangrila.pe';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = false;                                   // Enable SMTP authentication
            $mail->Username   = 'developer@@pethotelshangrila.pe';                     // SMTP username
            $mail->Password   = ';zLU{E#a,76}';                               // SMTP password
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('developer@pethotelshangrila.pe', 'Notification');
            $mail->addAddress($to, $toName);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            $this->logger->info('Correo enviado a ');
            // echo 'Message has been sent';
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}