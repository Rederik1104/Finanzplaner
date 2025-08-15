<?php
    require __DIR__ . '/vendor/autoload.php';
    // Setze den Content-Type auf JSON
    header('Content-Type: application/json');

    // Hole die Daten aus dem POST-Request (z.B. von register.js per fetch)
    $data = json_decode(file_get_contents('php://input'), true);

    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';
    $email = $data['email'] ?? '';

    use Dotenv\Dotenv;
    session_start();
    // Create a new Dotenv instance
    $dotenv = Dotenv::createUnsafeImmutable(__DIR__);
    
    // Load the environment variables
    $dotenv->load();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);
            
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.gmx.net';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rederik1104@gmx.de';                     //SMTP username
        $mail->Password   = getenv("GMX_PASSWORD");                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` 465
        
        //Recipients
        $mail->setFrom('rederik1104@gmx.de', 'Erik');
        $mail->addAddress($email, 'Erik');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
        //Content
        $code = rand(100000, 999999);
        $_SESSION["V-code"] = $code;
        
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verification, Finanzplaner';
        $mail->Body    = "Here is your verification code: $code";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
        //echo 'Message has been sent';
        //$_SESSION["V-code"] = $code;
        //$locked_code = password_hash($code, PASSWORD_DEFAULT);
        echo json_encode(['success' => true, 'message' => 'E-Mail wurde gesendet!']);
        exit();

    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo json_encode(['success' => false, 'message' => 'Fehler beim Senden der E-Mail: ' . $mail->ErrorInfo]);
        exit;
    }

?>