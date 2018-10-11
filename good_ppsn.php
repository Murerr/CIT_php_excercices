#!/usr/bin/php
<?php
function good_ppnn($argv){
	$ppnn_number = $argv[1]; // get argument from Linux console
	$array_ppnn = str_split($ppnn_number); //split each character into a array
	$check_letter_start_at = 1;
	if(sizeof($array_ppnn)>9 || sizeof($array_ppnn)<8 ){
		echo "Invalid PPNN NUmber\n";
		return false;
	}

	if(sizeof($array_ppnn) == 9){// -> New ppnn Number
		$check_letter_start_at = 2;
	} 
	
	$res = 0;
	$reversed_array_ppnn = array_reverse($array_ppnn); // reverse my array 1234567FA -> AF7654321
	for($i = $check_letter_start_at;$i < sizeof($reversed_array_ppnn); $i++){ // for start at 1 or 1  to skip the letters
		$weight = (2+$i)-$check_letter_start_at; 				// 7*2	+ 6*3 + 5*4 + .... 
		$res += (int)$reversed_array_ppnn[$i] * $weight;
		echo $res,"\n";
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
	
	$ppnn_letter = strtoupper($reversed_array_ppnn[0]); // where the letter is now 
	if(sizeof($array_ppnn) == 8){
		$expected_letter = array_search ($res%23, $alphabet);
		var_dump($ppnn_letter);
		if($ppnn_letter == $expected_letter){ // T
			echo"True by 8\n";
			return true;
		} 
	} else{
		$res += $alphabet[$ppnn_letter]*9; // else multiply the letter by 9 
		$expected_letter = array_search ($res%23, $alphabet);
		if($reversed_array_ppnn[1] == $expected_letter ){
			echo"True by 8\n";
			return true;
		}
	}
	
	

	/*
	for($i =65;$i < 65+26; $i++){
		echo chr($i),"=>\n";
	}*/
	
	//var_dump($alphabet);
	
	//$res = $res%23;
	//var_dump($res);




}
good_ppnn($argv);
?>

    






