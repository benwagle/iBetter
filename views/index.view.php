<!DOCTYPE html>
<html language = "en">
<head> 
	<!-- Page Information --> 
	<meta name = "charset" content ="UTF-8">
	<title> IBetter </title> 
	<!-- <link rel="icon" type="image/png" href="Images/favicon.ico" />  LINK FOR THE FAVICON-->
    <!-- <link rel="shortcut icon" href="Images/favicon.ico" /> Short Cut Icon -->
    <link href="style.css" rel="stylesheet" type="text/css"> <!-- Style Sheet I haven't create yet -->

</head> 
<body>
<div id = "main">
<div id = "container">

	<!--Logo Image I want it to be around W: 818 & H:200-->
	<img src="logo.jpg" alt="Logo" width="818" height="200"> 
	
	<!--Navigation--> 
	<nav>
		<ul>
		<li><a href="index.wave.html"><div class = nav_text> HOME </div></a></li>
		<li><a href="bet.html"><div class = nav_text> BET </div></a></li>
		<li><a href="about.html"><div class = nav_text> ABOUT </div></a></li>	
	</ul>
	</nav>
	
	<!--Scrolling-->
	<h1>The Wall of Bets</h1>
		<a href="/admin/"> Make a Bet </a>
		<!-- PHP -->
		<?php foreach($bets as $bet) : ?>
       	<article class = "boxes">
        	<h2><?= $bet['title']; ?></h2>
            <div class="bet-body">
            	<?= $bet['team1']; ?> vs. <?= $bet['team2']; ?>: <?= $bet['name1']; ?> and <?= $bet['name2']; ?> for $<?= $bet['amount']; ?>
                <a href="single.php?id=<?= $bet['id']; ?>"> Edit </a>
            </div>
       </article>
	<?php endforeach ?>
	
</div> <!-- End of Containter  -->	
</div> <!-- Main Page ID -- >
</body>
</html>