<?php

class checkNumbers
{
	/**
	 * Function to display the numbers
	 *
	 * @param Integer $quantity
	 * @return String
	 */
	public function displayNumbers($quantity = 75)
	{
		if (!is_numeric($quantity)) {
			echo "Exception. This class only accepts numbers as a parameter";
			return;
		}

		for ($i = 1; $i <= $quantity; $i++) {
			$is_multiple_tree = $this->isMultiple($i, 3);
			$is_multiple_five = $this->isMultiple($i, 5);

			//Check if multiple of both
			if ($is_multiple_tree == true && $is_multiple_five == true) {
				echo 'HelloWorld <br />';
				continue;	
			}
			
			//Check if multiple of three
			if ($is_multiple_tree) {
				echo 'Hello <br />';
				continue;	
			}

			//Check if multiple of three
			if ($is_multiple_five) {
				echo 'World <br />';
				continue;	
			}

			echo $i . '<br />';
		}
	}

	/**
	 * Function to check if the number is multiple of the divider
	 *
	 * @param Integer $number
	 * @param Integer $divider
	 * @return Boolean
	 */
	private function isMultiple($number = null, $divider = null)
	{
		//Validate if the parameters are not empty
		if ((is_null($number) || is_null($divider)) || (!is_numeric($number) || !is_numeric($divider))) {
			return false;
		}

		if ($number % $divider == 0) {
			return true;
		}

		return false;
	}
}

class checkArrays
{
	/**
	 * Public Vars
	 * @var 
	 */
	public $first_array;
	public $second_array;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->first_array = array(1, 2, 3, 4, 5);
		$this->second_array = array(1, 2, 3, 0, 5);
	}

	/**
	 * Function to Check the differences between two arrays
	 *
	 * @param Array $array1
	 * @param Array $array2
	 * @return Response
	 */
	public function checkDifferences($array1 = array(), $array2= array())
	{
		if (!is_array($array1) || !is_array($array2)) {
			echo "Exception. This class only accepts two arrays as a parameters";
			return;
		}

		$array1 = empty($array1) ? $this->first_array : $array1;
		$array2 = empty($array2) ? $this->second_array : $array2;

		$result = array_merge(array_diff($array1, $array2), array_diff($array2, $array1));

		if (empty($result)) {
			echo "No differences <br />";
			return;
		}

		print_r($result);
	}
}

$response = new checkNumbers();
$response->displayNumbers();

$response_array = new checkArrays();
$response_array->checkDifferences();

?>
