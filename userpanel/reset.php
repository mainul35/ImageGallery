
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<div class="registerPane">
    <div class="register-form">
        <div>
            <h1>Please enter your mail address: </h1>
        </div>
        <form method="post" action="./reset.php">
            <table class="form-field">
                <tbody>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input id="email" class="glowing-border" type="email" name="email"/></td>
                    </tr>
                    <tr>
                        <td><label for="email">Password for Gmail as HOST</label></td>
                        <td><input id="email" class="glowing-border" type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Submit" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once '../PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mainuls18@gmail.com';                 // SMTP username
    $mail->Password = $password;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('passwordchange@imagegallery.com', 'Image Gallery');
    $mail->addAddress($email);     // Add a recipient
    $mail->Subject = 'Password change request';
    $mail->Body = '<p>Please click the <a href="http://127.0.0.1/ImageGallery/userpanel/password_reset.php?email=' . $mail->Username . '">link</a> to reset password.';
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'A message with a password reset link has been sent to your email account.';
    }
}
?>