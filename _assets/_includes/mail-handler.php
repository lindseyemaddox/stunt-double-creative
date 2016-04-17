<?php
function convertHTMLtoTXT($message){
	$message = str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $message);
	$message = str_replace(" {2,}", ' ',$message);
	$message = trim($message);

	$message = str_replace("<p>", "", $message);
	$message = str_replace("<div>", "", $message);
	$message = str_replace(array("</p>", "</div>", "</h1>", "</h2>", "</h3>", "</h4>", "</h5>", "<br>", "<br />"), "\n", $message);

	$message = str_replace("\n ", "\n", $message);
	$message = strip_tags($message);

	return $message;
}

function sendEmail($to, $subject, $body, $file = false) {
	require_once "Mail.php";
	require_once "Mail/mime.php";
	$host = "ssl://smtpout.secureserver.net";
	$port = "465";

	$username = "alison@stuntdoublecreative.com";
	$password = "KaleSalad8880";

	$headers = array ('From' => $username,
	'To' => $to,
	'Subject' => $subject);

	$mime = new Mail_mime();
	$mime->setTXTBody(convertHTMLtoTXT($body));
	$mime->setHTMLBody($body);

	if($file)
	{
		$mime->addAttachment($file, 'application/octet-stream');
	}

	$body = $mime->get();
	$headers = $mime->headers($headers);


	$smtp = Mail::factory('smtp',
	array ('host' => $host,
	'port' => $port,
	'auth' => true,
	'username' => $username,
	'password' => $password
));

	$mail = $smtp->send($to, $headers, $body);

	if (PEAR::isError($mail)) {
		// testing only
		echo("<p>" . $mail->getMessage() . "</p>");
	}
}
