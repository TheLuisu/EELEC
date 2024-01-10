<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Contactos extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index(){
        if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['message'])) {
            if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['message'])){
                $mensaje = array('msg' => 'TODOS LOS CAMPOS SON REQUERIDOS', 'icono' => 'warning');
            } else {
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                //Server settings
                $mail->SMTPDebug = 0;                                       //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = HOST_SMTP;                              //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = USER_SMTP;                              //SMTP username
                $mail->Password   = PASS_SMTP;                              //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = PUERTO_SMTP;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('wicho0482@gmail.com', TITLE);
                $mail->addAddress($_POST['email']);             //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $_POST['nombre'] . 'MENSAJE DESDE: '. TITLE;
                $mail->Body    = $_POST['message'];
                $mail->AltBody = 'ESTE MENSAJE ES AUTOMATICO, FAVOR DE NO CONTESTAR';

                $mail->send();
                $mensaje = array('msg' => 'Correo enviado :)', 'icono' => 'success');
                } catch (Exception $e) {
                    $mensaje = array('msg' => 'Error al enviar el correo:' . $mail->ErrorInfo . ' :(', 'icono' => 'error');
                }
            }
        } else {
            $mensaje = array('msg' => 'ERROR FATAL :(', 'icono' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }
    
}
