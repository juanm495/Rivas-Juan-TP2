<?php

$errors = [];
$errorMessage = '';

if (isset($_POST['submit'])) {
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $message = $_POST['mensaje'];

    if (empty($name)) {
        $errors[] = 'Nombre esta vacio';
    }

    if (empty($email)) {
        $errors[] = 'Email esta vacio';
    }

    if (empty($message)) {
        $errors[] = 'Mensaje esta vacio';
    }

    if (empty($errors)) {
        $toEmail = 'example@example.com';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            echo "Mail enviado. Gracias " . $name . ", nos vamos a contactar pronto.";
        } else {
            echo "Algo no funciono, intenta despues.";
        }
    } else {
        $allErrors = join('<br/>', $errors);
        echo $allErrors;
    }
}
?>