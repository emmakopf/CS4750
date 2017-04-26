<?php
    session_start();
    ob_start();
    include_once("./library.php");
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        
        if (mysqli_connect_errno()) {
            echo("Can't connect to MySQL Server.");
            return null;
        }

	$submit = $_POST["submit"];
	$id = $_SESSION["id"];
	$username = $_SESSION["username"];
	if($submit == "I Have Already Seen This"){
		
		//If Show:
		if($id[0] == 2){
			$query1="INSERT INTO Watched_show Values ('$username', '$id')";
		}
		//if movie
		else{
			$query1="INSERT INTO Watched_movie Values ('$username', '$id')";
		}
			$result1 = mysqli_query($con, $query1);
            header("Location: info.php?id=".$id);
	}
	else if($submit == "Remove from Seen"){
		
		//If Show:
		if($id[0] == 2){
			$query2="DELETE FROM Watched_show 
			WHERE Watched_show.Username = '$username' 
			AND  Watched_show.TVID = '$id'";
		}
		//if movie
		else{
			$query2="DELETE FROM Watched_movie 
			WHERE Watched_movie.Username = '$username' 
			AND  Watched_movie.movie_id = '$id'";
		}
			$result2 = mysqli_query($con, $query2);
			header("Location: info.php?id=".$id);
	}
?>
