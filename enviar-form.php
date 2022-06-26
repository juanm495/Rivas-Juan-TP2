<?php

$destino='juan.rivas@davinci.edu.ar';

$origen_nombre='tp2 maquetado';

$origen_mail='jnrvs114@gmail.com';

$subject='Test de mail tp2';

$adondevoy='index.html';

$headers = "From: $origen_nombre <$origen_mail>\r\n";
$headers .= "Reply-to: $origen_mail\r\n";
$headers .= "Return-Path: $origen_nombre <$origen_mail>\r\n";

$mensaje='';
 foreach($_POST as $k => $v){
  if($k != 'Submit' && $k != 'Enviar'){
    $mensaje.=ucfirst($k).": $v\n";
  }
 }
 ini_set(sendmail_from,$origen_mail);
 mail($destino,$subject,$mensaje,$headers);
 header("Location:$adondevoy"); 

?>