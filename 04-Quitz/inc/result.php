<?php require_once __DIR__ . '/header.php'; ?>
<?php $result = 0; ?>

<h2>Ваши ответы:</h2>
<div class="quitz-content">
	<?php for ($i = 0; $i < count($questions); $i++): ?>
		<div class="question">
			<h3><?= $questions[$i]; ?></h3>
			<?php
			$user_answer = substr($_POST[str_replace(' ', '_', trim($questions[$i]))], 2);
			if ($user_answer == $correct_answers[$i])
				$result++;
			?>
			<h3 style=<?php if ($user_answer == $correct_answers[$i])
				echo "color:green;";
			else
				echo "color:red;"; ?>>
				<?= $answers[$i][$user_answer]; ?>
			</h3>
		</div>
	<?php endfor; ?>
</div>
<h2>Результат: <?= $result; ?></h2>
<?php require_once __DIR__ . '/footer.php'; ?>