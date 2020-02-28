<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../config.php';

// Load Composer's autoloader
//require 'vendor/autoload.php';
$email=$_POST['email'];

// Instantiation and passing `true` enables exceptions
$select="SELECT * FROM epeac_manager where email='$email'";
	$query=mysqli_query($conn,$select);
	if(mysqli_num_rows($query)>0)
	{
		
		$code=uniqid(true);
		$mail = new PHPMailer(true);
		$insert="INSERT INTO epeac_token(email,token) values('$email','$code')";
		$query=mysqli_query($conn,$insert);
		try {
			//Server settings
			//$mail->SMTPDebug = 1;                      // Enable verbose debug output
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'web.dev.project.wdp@gmail.com';                     // SMTP username
			$mail->Password   = 'web_dev_project';                               // SMTP password
			$mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 465;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('web.dev.project.wdp@gmail.com', 'Web_Developer');
			$mail->addAddress($email);     // Add a recipient
		 // $mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo('noreply@gmail.com', 'No-reply');
		   // $mail->addCC('cc@example.com');
		   // $mail->addBCC('bcc@example.com');

			// Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$url="http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/m_recovery_pass.php?code=$code";
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Password recovery mail';
			$mail->Body    = "<h1>Your Password Recovery Link is given below:</h1>
								Click <a href='$url'>here</a> to reset your password";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			header('Location:manager_login.php?pass_error=0');
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
	else
	{
		header('Location:m_forget_pass.php?pass_error=1');
	}
?>