<?php
class Point
{
	public $x = 0 {

		get {
			return $this->x;
		}
		set($value) {
			$this->x = $value;
		}
	}
	public $y = 0 {

		get {
			return $this->y;
		}
		set($value) {
			$this->y = $value;
		}
	}

	//Constructors:
	function __construct($x = 0, $y = 0)
	{
		$this->x;
		$this->y;
		echo "Constructor;<br>";
	}
	function __destruct()
	{
		echo "Destruct;<br>";
	}

	//Methods:
	function info()
	{
		echo "X = {$this->x}, Y = {$this->y};<br>";
	}
	function __tostring()
	{
		return "X = {$this->x}, Y = {$this->y};<br>";
	}
}

?>