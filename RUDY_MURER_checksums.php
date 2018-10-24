<html lang = "en">
<head>
<meta charset="UTF-8" />
<title>RUDY_MURER_CHECKSUMS</title>
<style>
td {
   border: 1px solid #1C6EA4;
}
h2 {
   color: red;
}
h3 {
   color: green;
}
</style>
</head>
<body>
<h1>CHECKSUMS</h1>
<form action="" method="post">
    PPSN: <input type="text" name="PPSN"><br>
    <input type="submit" name="PPSNButton">
</form>
<br>
<form action="" method="post">
    ISBN: <input type="text" name="ISBN"><br>
    <input type="submit" name="ISBNButton">
</form>
<form action="" method="post">
    PESEL: <input type="text" name="PESTEL"><br>
    <input type="submit" name="PESELButton">
</form>

<?php
if(isset($_POST['PPSNButton'])){
    $ppns_number = $_POST['PPSN'];
    if(good_ppns($ppns_number)){
        echo "<h3> Good PPNS </h3>";
    } else {
        echo "<h2> BAD PPNS number </h2>";
    }
}

if(isset($_POST['ISBNButton'])){ 
    $isbn_number = $_POST['ISBN'];
    if(good_isbn($isbn_number)){
        echo "<h3> Good isbn_number </h3>";
    } else {
        echo "<h2> BAD isbn_number </h2>";
    }
    
}
if(isset($_POST['PESELButton'])){ 
    $PESEL_number = $_POST['PESTEL'];
    if(good_pestel($PESEL_number)){
        echo "<h3> Good PESEL_number </h3>";
    } else {
        echo "<h2> BAD PESEL_number </h2>";
    }
    
}

function good_ppns($argv){
	$ppnn_number = $argv;
	$ppsn_array = str_split($ppnn_number); //split each character into a array
	$starting_check_letter = 1; // To skip the first letter
	if(sizeof($ppsn_array)>9 || sizeof($ppsn_array)<8 ){
		//echo "Invalid PPNN NUmber\n";
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
			//echo"True by 8\n";
			return true;
		} 
	} else if(sizeof($ppsn_array) == 9){ // 1234567FA
		$res += $alphabet[$ppns_letter]*9; // else multiply the letter by 9 
		$check_letter = array_search ($res%23, $alphabet);
		if($reversed_ppsn_array[1] == $check_letter ){ // check if the the second letter is correct
			//echo"True by 9\n";
			return true;
		}
	}

	//echo"FALSE";
	return false;
	
}

function good_isbn($argv){
    $isbn_number = $argv;
    $isbn_array = str_split($isbn_number); //split each character into a array
    
    if(sizeof($isbn_array) == 13){
        return isbn_13($isbn_array);
    } else if(sizeof($isbn_array) == 10){
        return isbn_10($isbn_array);
    } else {
        //echo "Invalid ISBN Number\n";
        return false;
    }    
    
}

function isbn_13($isbn_array){
    $res=0;
    for($i=0;$i<sizeof($isbn_array)-1;$i++){
        if($i%2 == 0){ // Multiply by 3
           $res+= (int)$isbn_array[$i];
        } else {
            $res+= (int)$isbn_array[$i]*3;
        }
    }
    $res = $res%10;
    $last_digit = (int)$isbn_array[sizeof($isbn_array)-1];
    if($res!=0){
        $check_digit = 10 - $res;
        if($check_digit == $last_digit){
            //echo "succes\n";
            return true;
        }
        else {
            //echo "False ISBN number\n";
            return false;
        }
    } else {
        //echo "ERROR False ISBN number\n";
        return false;
    }


}

function isbn_10($isbn_array){
    $isbn_array = array_reverse($isbn_array);
    $res = 0;
    for($i=1;$i<sizeof($isbn_array);$i++){
        $weigh = $i+1;
        $res+= (int)$isbn_array[$i] * $weigh;
    }
    $res = 11 - $res%11;
    $check_digit = (int)$isbn_array[0];
    if($res == $check_digit){
        //echo "succes\n";
        return true;
    } else {
        //echo "False ISBN number\n";
        return false;
    }


}
function good_pestel($argv){
    $pestel_number = $argv;
    $pestel_array = str_split($pestel_number); //split each character into a array
    
    if(sizeof($pestel_array) != 11){
        //echo "Incorrect Number false\n";
        return false;
    }

    $res = 0;
    for($i=0;$i<sizeof($pestel_array)-1;$i++){ // pestel array size -1 do not multiply last digit
        $res += (int)$pestel_array[$i] * multiplier($i+1); 
    }
    $res = $res%10;
    if($res == 0 || $res == 5 ){
        //echo"true modulo 0 or 5 \n";
        return true;
    } else{
        $last_number = (int)$pestel_array[sizeof($pestel_array)-1];
        if($last_number == 10 - $res){
            //echo "true \n";
            return true;
        }
    }
    //echo "false \n";
    return false;  
}
function multiplier(int $index){    //A*1 + B*3 + C*7 + D*9 + E*1 + F*3 + G*7 + H*9 + I*1 + J*3 
    if ($index > 4){
        return multiplier($index - 4); //recursive fucntion if index superior to 4 substract 4 until index is between 1 and 4
    }
    switch ($index) {
        case 1: return 1; //A   
        case 2: return 3; //B
        case 3: return 7; //C
        case 4: return 9; //D etc ..
    }
}




?>

<br>
<h3>Valid NUmbers</h3>
<ul> PPNS
    <li>1234567TW</li>
    <li>1234567FA</li>
    <li>0000000W</li>
    <li>0000071w</li>
    <li>1234567FA</li>
    
</ul>
<br>
<ul> ISBN
    <li>9992158107</li>
    <li>9992158107</li>
    <li>1843560283</li>
    <li>9789660500501</li> 
</ul>
<br>
<ul> pesel
    <li>44051401359</li>
    <li>02211307589</li>
</ul>


</body>
</html>