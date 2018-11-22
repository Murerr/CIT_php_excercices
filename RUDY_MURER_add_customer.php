<html lang = "en">
<head>
<meta charset="UTF-8" />
<title>Add Customers</title>
<style>
td {
   border: 1px solid #1C6EA4;
}
</style>
</head>
<body>
<h1>Adding User to the Db</h1>
<form action="" method="post">
    Name: <input type="text" name="name" required><br>
    Surname: <input type="text" name="surname" required><br>
    Phone Number: <input type="tel" name="phone" required><br>
    Year of Birth: <input type="number" name="date" required><br>
    <input type="submit" name="SubmitButton">
</form>


<?php

$dbc = connenctToDB();
getMovies($dbc);

if(isset($_POST['SubmitButton'])){ 
    $name = $_POST['name'];
    $surname = $_POST['surname']; 
    $phone = (string)$_POST['phone']; 
    $date = $_POST['date'];  
    $customerData = [$name,$surname,$phone,$date];
    if(!UserAlreadyExist($dbc,$customerData)){
        insertUserIntoDB($dbc,$customerData);    
    }
} 

function connenctToDB(){    
    $dbc = mysqli_connect ('localhost', 'root', '', 'metro_vision') OR die ("Something went wrong when I tried to connect to the database. There error message was :" . mysqli_connect_error());
    if (mysqli_ping($dbc)){
        echo 'MySqlServer' . mysqli_get_server_info($dbc) . ' on ' . mysqli_get_host_info($dbc) . "<br/>";
    }
    return $dbc;
}

function getMovies($dbc){
    $q = 'SELECT title, released FROM movies WHERE rating ="15A" ORDER BY released;';
    $r = mysqli_query($dbc, $q);
    echo ("--------<br/>");
    if (!($r)){
        echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($dbc) . "<br/>";
    }
    else {
        echo "<table><caption>PG Movies Available</caption>";
        
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
            echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
        }
    }
    echo "</table>";
    mysqli_free_result ($r);

}
function insertUserIntoDB($dbc,$customerData){
    $sql = "INSERT INTO customers (fname, sname, tel, dob)
    VALUES('$customerData[0]', '$customerData[1]', '$customerData[2]', '$customerData[3]')";
    $r = mysqli_query($dbc, $sql);
    if (!($r)){
        echo "Insert new user failed !\n" . mysqli_error($dbc) . "<br/>";
    } else {
        echo "User", $customerData[0],$customerData[1]," has been inserted into DB";
    }
}

function UserAlreadyExist($dbc,$customerData){
   
    $sql = "SELECT * FROM `customers` WHERE `sname` = '$customerData[1]' AND `tel` = '$customerData[2]' ";
    $r = mysqli_query($dbc, $sql);
    
    if (!($r)){
        echo "Can not acces Database !\n" . mysqli_error($dbc) . "<br/>";
    } else {
        if (mysqli_num_rows($r) == 0) {
            echo "This user do not exist yet\n"; 
            return false;
        }
        echo "This user already exist with the same phone number\n"; 
        return true;
    }

}

mysqli_close($dbc);

?>
<br/>
Have a nice day.

</body>
</html>