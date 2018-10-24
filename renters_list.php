
<html lang = "en">
<head>
<meta charset="UTF-8" />
<title>renters list</title>
<style>
td {
   border: 1px solid #1C6EA4;
}
</style>
</head>
<body>
<h1>Connecting to the Db</h1>


<?php

$dbc = connenctToDB();
getMovies($dbc);

function connenctToDB(){    
    $dbc = mysqli_connect ('localhost', 'root', '', 'metro_vision') OR die ("Something went wrong when I tried to connect to the database. There error message was :" . mysqli_connect_error());
    if (mysqli_ping($dbc)){
        echo 'MySqlServer' . mysqli_get_server_info($dbc) . ' on ' . mysqli_get_host_info($dbc) . "<br/>";
    }
    return $dbc;
}

function getMovies($dbc){
    $q = 'SELECT * FROM `rentals` 
    INNER JOIN `customers` on rentals.cust = customers.id 
    INNER JOIN `dvds` on rentals.disc = dvds.disc_id 
    INNER JOIN `movies` on dvds.movie_id = movies.id 
    WHERE rentals.return_date IS NULL';
    $r = mysqli_query($dbc, $q);
    echo ("--------<br/>");
    if (!($r)){
        echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($dbc) . "<br/>";
    }
    else {
        echo "<table><caption>Movies RENTED</caption>";
        echo "<tr>
        <th>Name</th>
        <th>Surname</th>
        <th>tel</th>
        <th>Title</th>
        <th>Rental Date</th>
        </tr>";
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
            echo "<tr>
            <td>".$row["fname"]."</td>
            <td>".$row["sname"]."</td>
            <td>".$row["tel"]."</td>
            <td>".$row["title"]."</td>
            <td>".$row["rental_date"]."</td>
            </tr>";
        }
    }
    echo "</table>";
    mysqli_free_result ($r);

}

mysqli_close($dbc);




?>

Have a nice day.

</body>
</html>