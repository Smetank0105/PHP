<?php
class Human
{
	public $last_name = "last name" {
		get {
			return $this->last_name;
		}
		set($value) {
			$this->last_name = $value;
		}
	}
	public $first_name = "first name" {
		get {
			return $this->first_name;
		}
		set($value) {
			$this->first_name = $value;
		}
	}
	public $age = 0 {
		get {
			return $this->age;
		}
		set($value) {
			$this->age = $value;
		}
	}

	//Constructor:
	function __construct(...$param)
	{
		$this->last_name = $param[0];
		$this->first_name = $param[1];
		$this->age = $param[2];
	}

	//Methods:
	function __tostring()
	{
		return "{$this->last_name} {$this->first_name}, {$this->age}";
	}

	function toArray()
	{
		return ['Human', $this->last_name, $this->first_name, $this->age];
	}
}

class Student extends Human
{
	public $speciality = "spec" {

		get {
			return $this->speciality;
		}
		set($value) {
			$this->speciality = $value;
		}
	}
	public $group = "group" {

		get {
			return $this->group;
		}
		set($value) {
			$this->group = $value;
		}
	}
	public $rate = 0 {

		get {
			return $this->rate;
		}
		set($value) {
			$this->rate = $value;
		}
	}
	public $attendance = 0 {

		get {
			return $this->attendance;
		}
		set($value) {
			$this->attendance = $value;
		}
	}

	//Constructor:
	function __construct(...$param)
	{
		parent::__construct(...$param);
		$this->speciality = $param[3];
		$this->group = $param[4];
		$this->rate = $param[5];
		$this->attendance = $param[6];
	}

	//Methods:
	function __tostring()
	{
		return parent::__tostring() . ", {$this->speciality}, {$this->group}, {$this->rate}, {$this->attendance}";
	}

	function toArray()
	{
		return [
			'Student',
			$this->last_name,
			$this->first_name,
			$this->age,
			$this->speciality,
			$this->group,
			$this->rate,
			$this->attendance
			];
	}

	public static function createFromHuman(Human $human, ...$param)
	{
		$student = new Student(
			$human->last_name,
			$human->first_name,
			$human->age,
			$param[0],
			$param[1],
			$param[2],
			$param[3]
		);
		return $student;
	}
}

class Graduate extends Student
{
	public $subject = "subject" {

		get {
			return $this->subject;
		}
		set($value) {
			$this->subject = $value;
		}
	}
	//Constructor:
	function __construct(...$param)
	{
		parent::__construct(...$param);
		$this->subject = $param[7];
	}

	//Methods:
	function __tostring()
	{
		return parent::__tostring() . ", {$this->subject}";
	}

	function toArray()
	{
		return [
			'Graduate',
			$this->last_name,
			$this->first_name,
			$this->age,
			$this->speciality,
			$this->group,
			$this->rate,
			$this->attendance,
			$this->subject
		];
	}

	public static function createFromStudent(Student $student, ...$param)
	{
		$graduate = new Graduate(
			$student->last_name,
			$student->first_name,
			$student->age,
			$student->speciality,
			$student->group,
			$student->rate,
			$student->attendance,
			$param[0]
		);
		return $graduate;
	}

	public static function createFromHuman(Human $human, ...$param)
	{
		$student = parent::createFromHuman($human, ...$param);
		$graduate =self::createFromStudent($student, $param[4]);
		return $graduate;
	}
}


?>