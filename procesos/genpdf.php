<?php
require 'frameworks/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
function enviarmail($destinatario1,$destinatario2,$envio,$rutaarchivo){
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP(); 
        $smtp->SMTPSecure = "tls";                                           //Send using SMTP
        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'correo';                     //SMTP username
        $mail->Password   = 'contraseña';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587; 
        $mail->setFrom('correo');    //Add a recipient
        $mail->addAddress($destinatario1);
        $mail->addAddress($destinatario2);
        $mail->addAttachment($rutaarchivo);
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
    }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
function genpdf($modelo,$titulo){
    ob_start();
        require_once $modelo;
        $html= ob_get_clean();
        $html2pdf = new Html2Pdf('p','a4','ES','true','UTF-8');
        $html2pdf->writeHTML($html);
        $idexamen=$_POST['idexamen'];
        $idlab=$_SESSION['iddoc'];
        $titulo=$titulo.$_POST['idexamen'].'.pdf';
        $query="Update examenes Set pdf='$titulo',ID_lab='$idlab',estado='Procesada'  Where ID_examen='$idexamen'";
        $rsquery= mysqli_query($con,$query) or die('Error: ' . mysqli_error($con));
        $ruta=dirname(__FILE__)."/pdf/".$titulo;
        $destinatario1=$fquery2['correo'];
        $destinatario2=$fquery3['correo'];
        $html2pdf->output($ruta,'f');
        // enviarmail($destinatario1,$destinatario2,'dolivaresiturbe@gmail.com',$ruta);
        header('Location: ../labmenu.php');
}
if(isset($_POST['ingresar'])){
    

    // include 'pasarpdf/vendor/spipu/html2pdf/src/Html2Pdf.php';

    if($_POST['ingresar']=="heces"){
        genpdf('modeloheces.php','pruebahecescod-');
    }elseif($_POST['ingresar']=="orina"){
        genpdf('modeloorina.php','pruebaOrinacod-');
    }elseif($_POST['ingresar']=="hematologia"){
        genpdf('modelohematologia.php','pruebaHematologiacod-');
    }elseif($_POST['ingresar']=="bioquimica"){
        genpdf('modelobioquimica.php','pruebabioquimicacod-');
    }
}


?>