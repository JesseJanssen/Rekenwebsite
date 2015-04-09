<?php
	echo '<style> .content { text-align: center; } </style>';
	if(isset($_COOKIE['Name']))
	{
		echo '<h1>Oefeningen</h1>
			<p>
				Welkom bij de oefeningen, hieronder kun je kiezen welke soort sommen je wilt oefenen. <br />
				Je kunt kiezen uit plus-, min-, deel-, en keersommen. <br />
				Als je gekozen hebt wat je wil doen dan klik je op start en dan kun je beginnen.<br />
				Zorg dat je goed genoeg geoefend hebt voordat je met de toets gaat beginnen.<br />
				Succes!
				<br /><br />
				<form method="post" action="index.php?P=StartOefeningen&Opgave=1">
					<select name="Sort">
						<option value="0">Optellen</option>
						<option value="1">Aftrekken</option>
						<option value="2">Vermenigvuldigen</option>
						<option value="3">Delen</option>
					</select>
					<br />
					<input class="button" type="submit" value="Start oefeningen" />
				</form>
			</p>';
	} ?>