<?php
	if(isset($_COOKIE['Name']))
		{
		echo '<h1>Zoek je hulp?</h1>
			<p>Als het goed is ben je nu al ingelogd, je ziet rechtsboven je naam en groep staan. Nu kunnen we gaan rekenen!<br/><br />
			Als je eerst oefeningen wil doen dan klik je links in het menu op de knop ‘Oefeningen’. <br />
			Dan kun je selecteren welk soort sommen je wil oefenen. Optellen, aftrekken, vermenigvuldigen of delen. Als je gekozen hebt wat je wil doen dan start je je met oefenen. <br />Je krijgt '.$Vragen.' sommen die je moet uitrekenen, daarna krijg je te zien welke er goed en fout zijn.<br /><br />
			Als je al denkt dat je al genoeg geoefend hebt dan klik je op de knop ‘Toets’.<br />
			Je krijgt bij de toets '.$Vragen.' vragen, van iedere soort 5 maar deze zijn wel door elkaar gegooid.<brb /><br/> Als je met de toets klaar bent dan krijg je te zien welke goed en fout zijn, ook krijg je een cijfer. Hiermee kun je zien of je het goed gedaan hebt.
			</p>';
		} ?>