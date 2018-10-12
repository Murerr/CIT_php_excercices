#!/usr/bin/php
<?php
function good_isbn($argv){
    $isbn_number = $argv[1]; // get argument from Linux console
    $isbn_array = str_split($isbn_number); //split each character into a array
    
    //TODO add condition size of

    $res=0;
    for($i=0;$i<sizeof($isbn_array)-1;$i++){
        if($i%2 == 0){ // Multiply by 3
           $res+= (int)$isbn_array[$i];
        } else {
            $res+= (int)$isbn_array[$i]*3;
        }
    }
    $res = $res%10;
    $last_digit = $isbn_array[sizeof($isbn_array)-1];
    if($res!=0){
        $check_digit = 10 - $res;
        if($check_digit == $last_digit){
            echo "succes\n";
            return true;
        }
    }
    var_dump($res);
    
    
}
good_isbn($argv);
?>