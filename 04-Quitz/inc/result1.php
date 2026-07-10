<?php require_once __DIR__ . '/header.php'; ?>



<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

$asked_questions = array_keys($_POST);
$user_answers = array_values($_POST);
$score = 0;

for ($i = 0; $i < count($user_answers); $i++) {
	$answer = $user_answers[$i][strlen($user_answers[$i]) - 1];
	//echo $answer;
	if ($answer == $correct_answers[$i])
		$score++;
}
$score_message = "Количество правильных ответов: {$score}.";
$reseipient = 'Satzugai@yandex.ru';
//$reseipient = 'in01051988@mail.ru';
//$reseipient = 'kovtun_ol@t.top-academy.ru';
//$reseipient = 'batumivice@yandex.ru';
$sender = 'user@topacademy.ru';
//$headers .= "To: {$reseipient}";
$headers = "From: {$sender}\r\n";

echo '<div class="result">';
echo $score_message;
echo '</div>';
#echo mail($reseipient, 'Результаты тестирования', $score_message, $headers);
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

$mail = new PHPMailer(true);

try {
	// Настройки сервера
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Mailer = 'smtp';
	$mail->Host = '127.0.0.1';
	$mail->SMTPAuth = true;
	$mail->Username = 'user@topacademy.ru';
	$mail->Password = '123';
	$mail->Port = 25;

	$mail->setFrom('user@topacademy.ru', 'user');
	//$mail->addAddress('batumivice@yandex.ru', 'Oleg k');
	//$mail->addAddress('kovtun_ol@t.top-academy.ru', 'Oleg k');
	$mail->addAddress('Satzugai@yandex.ru', 'Nikita I');
	//$mail->addAddress('in01051988@mail.ru', 'Никита Ильиных');

	$mail->isHTML(true);
	$mail->Subject = 'Результаты тестирования';
	$mail->Body = "Количество правильных ответов: {$score}.";

	$mail->send();
	echo 'Message has been sent';
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<?php require_once __DIR__ . '/footer.php'; ?>