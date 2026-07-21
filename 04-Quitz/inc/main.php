<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/header.php';
echo "Привет, {$_POST['first_name']} {$_POST['last_name']}, приятного прохождения ;-)";
?>

<form id="question_number" action="result1.php" method="post"></form>

<script>
	var questionNumber = -1;

	function nextQuestion() {
		let answer = getAnswer();
		questionNumber++;

		let request = new XMLHttpRequest();
		request.onreadystatechange = function () {
			document.getElementById("question_number").innerHTML = request.responseText;
		}
		if (answer == null) request.open("GET", "question.php?q=" + questionNumber, true);
		else request.open("GET", "question.php?q=" + questionNumber + "&a=" + answer.value, true);
		request.send();
	}


	function prevQuestion() {
		if (questionNumber == 0) return;
		let answer = getAnswer();
		questionNumber--;

		let request = new XMLHttpRequest();
		request.onreadystatechange = function () {
			document.getElementById("question_number").innerHTML = request.responseText;
		}
		if (answer == null) request.open("GET", "question.php?q=" + questionNumber, true);
		else request.open("GET", "question.php?q=" + questionNumber + "&a=" + answer.value, true);
		request.send();
	}


	function getAnswer() {
		let answer = document.querySelector(`input[name="question_${questionNumber}"]:checked`);
		if (answer != null) console.log(answer.value);
		else console.log("No answer");
		return answer;
	}

	window.onload = nextQuestion;
</script>
<?php require_once __DIR__ . '/footer.php'; ?>