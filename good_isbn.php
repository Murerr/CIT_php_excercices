#!/usr/bin/php
<?php
function good_isbn($argv){
    $isbn_number = $argv[1]; // get argument from Linux console
    $isbn_array = str_split($isbn_number); //split each character into a array
    
    if(sizeof($isbn_array) == 13){
        return isbn_13($isbn_array);
    } else if(sizeof($isbn_array) == 10){
        return isbn_10($isbn_array);
    } else {
        echo "Invalid ISBN Number\n";
        return false;
    }    
    
}
good_isbn($argv);


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
            echo "succes\n";
            return true;
        }
        else {
            echo "False ISBN number\n";
            return false;
        }
    } else {
        echo "ERROR False ISBN number\n";
        return false;
    }
    var_dump($res);

}

function isbn_10($isbn_array){
    $isbn_array = array_reverse($isbn_array);
    $res = 0;
    for($i=1;$i<sizeof($isbn_array);$i++){
        $weigh = $i+1;
        $res+= (int)$isbn_array[$i] * $weigh;
        echo $res,"\n";
    }
    $res = 11 - $res%11;
    $check_digit = (int)$isbn_array[0];
    var_dump($res);
    var_dump($check_digit);
    if($res == $check_digit){
        echo "succes\n";
        return true;
    } else {
        echo "False ISBN number\n";
        return false;
    }


}
?>