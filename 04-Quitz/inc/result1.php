<?php require_once __DIR__ . '/header.php'; ?>


<?php
session_start();

$score = 0;
for ($i = 0; $i < count($questions); $i++) {
	if (isset($_SESSION["question_{$i}"]) && $_SESSION["question_{$i}"] == $correct_answers[$i]){
		$score++;
		unset($_SESSION["question_{$i}"]);
	}
}
//session_destroy();

$score_message = "Количество правильных ответов: {$score}.";
$reseipient = 'Satzugai@yandex.ru';
$sender = 'user@topacademy.ru';
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
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Mailer = 'smtp';
	$mail->Host = '127.0.0.1';
	$mail->SMTPAuth = true;
	$mail->Username = 'user@topacademy.ru';
	$mail->Password = '123';
	$mail->Port = 25;
	$mail->setFrom('user@topacademy.ru', 'user');
	$mail->addAddress('Satzugai@yandex.ru', 'Nikita I');
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