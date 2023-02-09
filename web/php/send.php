<?php
require '../PHPMailer/PHPMailerAutoload.php';
$enviar = new PHPMailer;

$to = "contactenos@unidaddepatologiaclinica.com";
	   

$nombre = htmlentities($_POST['nombre']);
$empresa = htmlentities($_POST['empresa']);
$mail = htmlentities($_POST['mail']);
$mensaje = htmlentities($_POST['mensaje']);


if($nombre == "" || $empresa =="" || $mail == "" || $mensaje == ""):
	echo '<div class="alert alert-danger">Todos los Campos Son Requeridos</div>';
else:

	$enviar->From = $mail;
	$enviar->FromName = $nombre; 
	$enviar->addAddress($to);
	$enviar->Subject = 'Solicitud de Cotizacion - '. $empresa;
	$enviar->isHtml(true);
	$enviar->Body = $nombre. '<br>'.$mensaje;
	//$enviar->send(); 
	//mail("desarrollo@ados-software.com", "Solicitud de Cotizacion", $mensaje, $mail);
	if(!$enviar->send()) {
    	echo '<div class="alert alert-danger">El Mensaje no pudo ser enviado</div>';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
    	echo '<div class="alert alert-info">Solicitud Enviada</div>';
	}
		

endif;
?>