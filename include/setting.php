<?php

function getPHPmailer(){
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->CharSet	= "UTF-8";
	//$mail->From     = "icarstudio@jiesoftwarehouse.com";
	// $mail->From     = "noreply@sunsnack.com";
	// $mail->FromName = "Sunsnack";
	$mail->isHTML(true); 
	$mail->SMTPAuth   = true; 
	
	
	$mail->Host = "mail.tprp.co.th"; // SMTP server
	$mail->Port = 25; // พอร์ท
	$mail->Username = "admin@tprp.co.th"; // account SMTP
	$mail->Password = "753159"; // รหัสผ่าน SMTP	

	// $mail->Host = "mail.tprp.co.th"; // SMTP server
	// $mail->Port = 25; // พอร์ท
	// $mail->Username = "noreply@tprp.co.th"; // account SMTP
	// $mail->Password = "1NBy8Snl"; // รหัสผ่าน SMTP	

$mail->AddAddress("worapot.dmas@gmail.com", "Tprp");
$mail->AddBCC("mcnet007@gmail.com", "Pae");
		
	return $mail;
}




?>