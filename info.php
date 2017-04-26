<?php
    session_start();
     ################### Check Login Status ###################
	 if(!$_SESSION["login"]){
		header('Location: index.html');
	  } 
	 else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 </head>
    <nav class="navbar navbar" style="color:black">
        <div class="container-fluid">

            <!--Home-Header button of navbar -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.php" style="color:white">NeXtflix</a>
            </div>

            <div class="collapse navbar-collapse" id="topNavBar">

				 <ul class="nav navbar-nav navbar-right">
					<li class="">
						<a href="logout.php" style="color:white">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Logout
						</a>
					</li>
				</ul>
				<ul class ="nav navbar-nav navbar-right">
				    <li class="">
				        <a href="verify.php" style="color:white">
				            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit Profile
				        </a>
				    </li>
				</ul>
                <ul class="nav navbar-nav navbar-right" style="color:white">
                    <li class="">
                        <a href="what_to_watch.php" style="color:white">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp; What to Watch!
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="color:white">
                    <li class="">
                        <a href="random.php" style="color:white">
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp; Surprise me!
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 <style>
     body {
         background-color: black;
         background-repeat: no-repeat;
     }
     .navbar{
            font-family: Avenir;
            border-radius: 0;
        }
     h1{
         font-family: Avenir;
         color: white;
         text-align: center;

     }
     h2 {
         font-family: Avenir;
         color: white;
         margin-left: 5%;
     }
	 h3 {
         font-family: Avenir;
         color: white;
         margin-left: 5%;
     }
     p{
         font-family: Avenir;
         color: white;
         margin-left: 5%;
     }
     input{
         font-family: Avenir;
     }
 </style>
<body>
    <h1>Welcome: <?php echo($_SESSION["username"]); ?> </h1>
	 
    <h2><?php
		//Setup Database
		include_once("library.php");
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        
        if (mysqli_connect_errno()) {
            echo("Can't connect to MySQL Server.");
            return null;
        }
		
		$id = htmlspecialchars($_GET["id"]);
		$_SESSION["id"] = $id;
		$myUsername = $_SESSION["username"];
		//Query:
		$query1="SELECT * FROM TVShows WHERE tvid = '$id'";
		$query2="SELECT * FROM Movies WHERE movie_id = '$id'";
		//Seen it?
		if($id[0] == 2){
			$query3="SELECT * FROM Watched_show WHERE tvid = '$id' AND '$myUsername' = username";
		}
		//if movie
		else{
			$query3="SELECT * FROM Watched_movie WHERE movie_id = '$id' AND '$myUsername' = username";
		}
		$result1 = mysqli_query($con, $query1);
		$result2 = mysqli_query($con, $query2);
		$result3 = mysqli_query($con, $query3);
		//If Show:
		if($id[0] == 2){
			while($row = mysqli_fetch_array($result1)) { 
				$title = $row['Title'];
				echo($title."<br>");
				$seasons = $row['Seasons'];
				echo("Seasons: ".$seasons."<br>");
				$genre = $row['Genre'];
				echo("Genre: ".$genre."<br>");
				$rating = $row['Rating'];
				echo("Rating: ".$rating."<br>");
			}
		}
		//If Movie:
		else{
			while($row = mysqli_fetch_array($result2)) { 
				$title = $row['Title']; 
				echo($title."<br>");
				$rating = $row['Rating'];
				echo("Rating: ".$rating."<br>");
				$director = $row['director'];
				echo("Director: ".$director."<br>");
				$genre = $row['Genre'];
				echo("Genre: ".$genre."<br>");
				$releaseDete = $row['release_date'];
				echo("Released on: ".$releaseDete."<br>");
			}
		}
		if(mysqli_fetch_array($result3)){
			$watched = true;
		}
		?>
		<img src='./images/<?php echo($id); ?>.jpg'>
	</h2>	
	<form action="seen.php" method="post">
		<div id="add" style="display: blcok;">
			<input type = "submit" id = "add" value = "I Have Already Seen This" name ="submit" style="margin-left: 5%;">
		</div>
		<div id="remove" style="display: none;">
			<input type = "submit" id = "remove" value = "Remove from Seen" name ="submit" style="margin-left: 5%;">
		</div>
	</form>
	
	<?php  }?>
	<script type = "text/javascript">
	var watched = <?php echo $watched ?>;
 if(watched){
	togglediv(watched);
	}
 function togglediv(watched) {
	var a = document.getElementById('add');
	var r = document.getElementById('remove');	
	if(watched){
		r.style.display = "block";	
		a.style.display = "none";	
	}
	else{
		a.style.display = "block";	
		r.style.display = "none";
	}
}
</script>
</body>

</html>
