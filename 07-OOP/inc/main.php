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
echo $human;

$student = new Student("Pinkman", "Jessie", 20, "Chemistry", "WW_220", 90, 95);
echo $student;

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
echo $graduate;
?>