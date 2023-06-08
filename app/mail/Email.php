<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{

    private PHPMailer\PHPMailer\PHPMailer $phpMailer;
    public function __construct()
    {
        $this->phpMailer = new PHPMailer\PHPMailer\PHPMailer(true);
    }

    public function sendEmail(string $recipientsAddess, string $token)
    {
        try {
            //config smtp sendding email
            // $this->phpMailer->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->phpMailer->isSMTP();                                            //Send using SMTP
            $this->phpMailer->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this->phpMailer->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->phpMailer->Username   = 'goffardevelopment@gmail.com';                     //SMTP username
            $this->phpMailer->Password   = 'zleawfrqamfbhopp';                               //SMTP password
            $this->phpMailer->SMTPSecure = "ssl";            //Enable implicit TLS encryption
            $this->phpMailer->Port       = 465;

            //config proccess sending email
            $this->phpMailer->setFrom('goffardevelopment@gmail.com', 'abdul goffar'); //sender address email
            $this->phpMailer->addAddress($recipientsAddess);               //recipients address email
            $this->phpMailer->addReplyTo('goffardevelopment@gmail.com', 'developer'); //reply address email

            //config send email fromat
            $this->phpMailer->isHTML(true);                                  //Set email format to HTML
            $this->phpMailer->Subject = 'data api anda akan kadaluarsa dalam waktu 30 hari kedepan, Bearer token authorization anda: ' . $token;
            $this->phpMailer->Body    = 'Api Student';
            $this->phpMailer->AltBody = 'APi Student For Client';

            //config content sending

            $this->phpMailer->send();
        } catch (Exception $e) {
            var_dump($e);
        }
    }
}
