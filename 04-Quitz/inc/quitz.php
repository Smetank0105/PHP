<?php
require_once __DIR__ . '/header.php';
echo "Привет, {$_POST['first_name']} {$_POST['last_name']}, приятного прохождения ;-)";
?>

<form action="result1.php" method="post" class="form-quitz">
	<div class="quitz-content">
		<?php for ($i = 0; $i < count($questions); $i++): ?>
			<div class="question <?php echo ($i === 0) ? 'active' : ''; ?>">
				<h3><?= $questions[$i]; ?></h3>
				<div class="options">
					<?php for ($j = 0; $j < count($answers[$i]); $j++): ?>
						<label>
							<input type="radio" name="<?= $questions[$i] ?>" id="<?= "{$i}_{$j}" ?>" value="<?= "{$i}_{$j}" ?>" />
							<?= $answers[$i][$j] ?>
						</label><br />
					<?php endfor; ?>
				</div>
			</div>
		<?php endfor; ?>
	</div>

	<div class="nav-buttons">
		<button type="button" id="prev-btn" onclick="changeSlide(-1) style="display:none;">Prev</button>
		<div></div>
		<button type="button" id="next-btn" onclick="changeSlide(1)">Next</button>
	</div>
	<div style="width:100%; display:flex; justify-content:space-around;">
		<div>Question: <span id="current-slide-num">1</span>/<span id="total-slides"><?= count($questions) ?></span></div>
	</div>

	<div class="submit-container" id="submit-container">
		<input type="submit" value="Отправить" />
	</div>
</form>

<script>
	let currentSlide = 0;

	function changeSlide(n) {
		const questions = document.getElementsByClassName("question");
		if (questions[currentSlide]) {
			questions[currentSlide].classList.remove("active");
        }
		currentSlide += n;

		if (currentSlide < 0) {
			currentSlide = 0;
		}

		if (currentSlide >= questions.length) {
			currentSlide = questions.length - 1;
			document.getElementById("next-btn").style.display = "none";
			showSubmit();
		} else {
			questions[currentSlide].classList.add("active");
			hideSubmit();
		}

		document.getElementById("current-slide-num").textContent = currentSlide + 1;

		const prevBtn = document.getElementById("prev-btn");
		const nextBtn = document.getElementById("next-btn");

		if (currentSlide === 0) {
			prevBtn.style.display = "none";
		} else {
			prevBtn.style.display = "inline-block";
		}

		if (currentSlide === questions.length - 1) {
			nextBtn.style.display = "none";
			showSubmit();
		} else {
			nextBtn.style.display = "inline-block";
			hideSubmit();
		}
	}

	function showSubmit() {
		document.getElementById("submit-container").style.display = "block";
	}
	function hideSubmit() {
		document.getElementById("submit-container").style.display = "none";
	}
</script>

<?php require_once __DIR__ . '/footer.php'; ?>