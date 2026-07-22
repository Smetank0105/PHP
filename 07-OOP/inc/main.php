<?php
require_once __DIR__ . '/point.php';
require_once __DIR__ . '/inheritance.php';
/*
$A = new Point();
$A->info();
$A->x = 7;
$A->y = 8;
echo $A;
*/

$human = new Human("Vercetty", "Tommy", 30);
echo "<b>Human:</b>\t" . $human . '<br>';

$h_student = Student::createFromHuman($human, "Thief", "Vice", 90, 95);
echo "<b>Student From Human:</b>\t" . $h_student . '<br>';

$h_graduate = Graduate::createFromHuman($human, "Thief", "Vice", 90, 95, "Grand Thief Auto");
echo "<b>Graduate From Human:</b>\t" . $h_graduate . '<br>';

$student = new Student("Pinkman", "Jessie", 20, "Chemistry", "WW_220", 90, 95);
echo "<b>Student:</b>\t" . $student . '<br>';

$s_graduate = Graduate::createFromStudent($student, "Breaking Bad");
echo "<b>Graduate From Student:</b>\t" . $s_graduate . '<br>';

$graduate = new Graduate
(
	"Schreder",
	"Hank",
	40,
	"Criminalistic",
	"OBN",
	50,
	70,
	"How to catch Hiesenberg"
);
echo "<b>Graduate:</b>\t" . $graduate . '<br>';

$group = [
	$human,
	$h_student,
	$h_graduate,
	$student,
	$s_graduate,
	$graduate
];

echo "<br><b>Массив group собран:</b><br>";
foreach ($group as $member) {
	echo $member . '<br>';
}

//TXT
$file_txt = 'group.txt';
$out_data_txt = serialize($group);
file_put_contents($file_txt, $out_data_txt);

echo "<br><b>Массив group записан в файл '$file_txt'.</b><br>";

$in_data_txt = file_get_contents($file_txt);
$restored_group_from_txt = unserialize($in_data_txt);

echo "<br><b>Массив restored_group_from_txt прочитан из файла '$file_txt':</b><br>";
foreach ($restored_group_from_txt as $member) {
	echo $member . '<br>';
}

//CSV
$file_csv = 'group.csv';
$in_data_csv = fopen($file_csv, 'w');

foreach ($group as $member) {
	fputcsv($in_data_csv, $member->toArray(), ',', '"', '');
}

fclose($in_data_csv);
echo "<br><b>Массив group записан в файл '$file_csv'.</b><br>";

$restored_group_from_csv = [];
$out_data_csv = fopen($file_csv, 'r');

while (($row = fgetcsv($out_data_csv, null, ',', '"', '')) !== false) {
	$constructor = array_shift($row);
	$restored_group_from_csv[] = new $constructor(...$row);
}

fclose($out_data_csv);

echo "<br><b>Массив restored_group_from_csv прочитан из файла '$file_csv':</b><br>";
foreach ($restored_group_from_csv as $member) {
	echo $member . '<br>';
}

?>