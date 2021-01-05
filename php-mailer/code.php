 <?php
        require_once ('php-mailer/PHPMailerAutoload.php');
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure='ssl';
        $mail->Host='smtp.googlemail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username ='bankai.alert@gmail.com';
        $mail->Password ='vinachox071';
        $mail->SetFrom('no-reply@howcode.org');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email);
        
        if(!$mail->Send()) 
        {
            $msg = " An Error Ocuured while trying to send Mail, Kindly Contact Administrator. Thanks!";
        } 
        ?>