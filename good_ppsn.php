#!/usr/bin/php
<?php
function good_ppns($argv){
	$ppnn_number = $argv[1]; // get argument from Linux console
	$ppsn_array = str_split($ppnn_number); //split each character into a array
	$starting_check_letter = 1; // To skip the first letter
	if(sizeof($ppsn_array)>9 || sizeof($ppsn_array)<8 ){
		echo "Invalid PPNN NUmber\n";
		return false;
	}

	if(sizeof($ppsn_array) == 9){// -> New ppnn Number
		$starting_check_letter = 2;
	} 

	$res = 0;
	$reversed_ppsn_array = array_reverse($ppsn_array); // reverse my array 1234567FA -> AF7654321
	for($i = $starting_check_letter;$i < sizeof($reversed_ppsn_array); $i++){ // for start at 1 or 1  to skip the letters
		$weight = (2+$i)-$starting_check_letter; 				// 7*2	+ 6*3 + 5*4 + .... 
		$res += (int)$reversed_ppsn_array[$i] * $weight;
	}
		$alphabet = array(
	'W'=>	0,
	'A'=>	1,
	'B'=>	2,
	'C'=>	3,
	'D'=>	4,
	'E'=>	5,
	'F'=>	6,
	'G'=>	7,
	'H'=>	8,
	'I'=>	9,
	'J'=>	10,
	'K'=>	11,
	'L'=>	12,
	'M'=>	13,
	'N'=>	14,
	'O'=>	15,
	'P'=>	16,
	'Q'=>	17,
	'R'=>	18,
	'S'=>	19,
	'T'=>	20,
	'U'=>	21,
	'V'=>	22,
	'X'=>	23,
	'Y'=>	24,
	'Z'=>	25);
	
	$ppns_letter = strtoupper($reversed_ppsn_array[0]); // where the letter is now 
	if(sizeof($ppsn_array) == 8){
		$check_letter = array_search ($res%23, $alphabet);
		if($ppns_letter == $check_letter){ // T -> 1234567T
			echo"True by 8\n";
			return true;
		} 
	} else if(sizeof($ppsn_array) == 9){ // 1234567FA
		$res += $alphabet[$ppns_letter]*9; // else multiply the letter by 9 
		$check_letter = array_search ($res%23, $alphabet);
		if($reversed_ppsn_array[1] == $check_letter ){ // check if the the second letter is correct
			echo"True by 9\n";
			return true;
		}
	}

	echo"FALSE";
	return false;
	
}
good_ppns($argv);

?>

    






