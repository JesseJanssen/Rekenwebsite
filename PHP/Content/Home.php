<?php
	if(isset($_COOKIE['Name']))
	{
		echo '<h1>Welkom</h1>
			<p>
				Welkom op de rekenwebsite van basisschool De Splinter.
				<br / ><br />
				Als je wat uitleg over de site wil klik dan <a class="helpbtn" href=index.php?P=Help><b>hier</b></a> om naar de help pagina te gaan.
				<br />
				Deze site is alleen bedoeld voor kinderen van de basisschool, zonder inloggegevens kun je niets op deze site.
			</p>
			<img src="../IMG/Welkom.png" />';
	}
	else
	{
		echo '<h1>Welkom</h1>
			<p>
				Welkom op de rekenwebsite van basisschool De Splinter.
				<br / ><br />
				Om te kunnen oefenen en om een toets te maken, moet je eerst inloggen met je naam en wachtwoord.
			</p>
			<img src="../IMG/Welkom.png" />';
	} ?>