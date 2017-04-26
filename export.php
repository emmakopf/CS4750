<?php
    
    include_once("./library.php");
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    
    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server.");
        return null;
    }
    
    $result = $con->query('SELECT Title, Genre FROM Movies UNION ALL SELECT Title, Genre FROM TVShows');
    $fp = fopen('php://output', 'w');
    if ($fp && $result) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="list.csv"');
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            fputcsv($fp, array_values($row));
        }
        die;
    }
    
    header("Location: profile.php")
?>
