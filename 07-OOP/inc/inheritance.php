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
	//function __construct($last_name, $first_name, $age)
	function __construct(...$param)
	{
		$this->last_name = $param[0];
		$this->first_name = $param[1];
		$this->age = $param[2];
		echo "<br>HConstructor<br>";
	}
	function __destruct()
	{
		echo "<br>HDestructor<br>";
	}

	//Methods:
	function __tostring()
	{
		echo "<pre>";
		print_r(__CLASS__ . '<br>');
		//var_dump($this);
		//print_r($this);
		echo "</pre>";
		return "{$this->last_name} {$this->first_name}, {$this->age}";
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
		echo "<br>SConstructor<br>";
	}
	//function __construct($last_name, $first_name, $age, $speciality, $group, $rate, $attendance)
	//{
	//	parent::__construct($last_name, $first_name, $age);
	//	$this->speciality = $speciality;
	//	$this->group = $group;
	//	$this->rate = $rate;
	//	$this->attendance = $attendance;
	//	echo "<br>SConstructor<br>";
	//}
	function __destruct()
	{
		echo "<br>SDestructor<br>";
	}
	//Methods:
	function __tostring()
	{
		echo "<pre>";
		print_r(__CLASS__ . '<br>');
		//var_dump($this);
		//print_r($this);
		echo "</pre>";
		return parent::__tostring() . ", {$this->speciality}, {$this->group}, {$this->rate}, {$this->attendance}";
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
	function __construct($last_name, $first_name, $age, $speciality, $group, $rate, $attendance, $subject)
	{
		parent::__construct($last_name, $first_name, $age, $speciality, $group, $rate, $attendance);
		$this->subject = $subject;
	}
}


?>