<?php
    include_once("./library.php");
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    
    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server.");
        return null;
    }
    
    $username = $_SESSION["username"];
    
    $sql="(SELECT TVID AS ID from TVShows WHERE TVID NOT IN (SELECT TVID from Watched_show Where Username = '$username')) UNION ALL (SELECT movie_id AS ID from Movies WHERE movie_id NOT IN (SELECT movie_id from Watched_movie Where Username = '$username')) ORDER BY RAND() LIMIT 1";
     $result = mysqli_query($con, $sql);
    
    while($results = mysqli_fetch_array($result)) {
        $id = $results['ID'];
    }
    
    ?>

    <script type = "text/javascript">
        window.location.replace("info.php?id=<?php echo($id);?>");
    </script>
