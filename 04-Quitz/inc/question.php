<?php
require_once __DIR__ . '/data.php';
session_start();

$number = $_REQUEST['q'];
$answer;
if (isset($_REQUEST['a'])) {
	$answer = $_REQUEST['a'];
	$arr = explode("_", $answer);
	$_SESSION["question_{$arr[0]}"] = $arr[1];
}


if($number < count($questions))
{
	echo $number;
	$response = "<h2>{$questions[$number]}</h2>";
	for ($i = 0; $i < count($answers[$number]); $i++)
	{
		$isChecked = (isset($_SESSION["question_{$number}"]) && $_SESSION["question_{$number}"] == $i) ? "checked" : "";
		$response .= "<input type=\"radio\" name=\"question_{$number}\" id=\"{$number}_{$i}\" value=\"{$number}_{$i}\" ".$isChecked.">";
		$response .= "<label for=\"{$number}_{$i}\">\"{$answers[$number][$i]}\"</label>;<br>";
	}
	$response .= "<input type=\"button\" value=\"Prev\" onclick=\"prevQuestion()\">";
	$response .= "<input type=\"button\" value=\"Next\" onclick=\"nextQuestion()\">";
	echo $response;
} else {
	$response = "<h2>Вы ответили на все вопросы, для того чтобы подсчитать результаты нажмите кнопку</h2>";
	$response .= "<input type=\"submit\" value=\"Посмотреть результат\">";
	echo $response;
}

?>
