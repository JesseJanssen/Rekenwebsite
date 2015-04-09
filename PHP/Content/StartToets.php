<?php
	if(isset($_COOKIE['Name']))
	{
		if($_GET['Opgave'] < 1) $_GET['Opgave'] = 1;
		else if($_GET['Opgave'] > $Vragen) $_GET['Opgave'] = $Vragen;
		echo '<ul class="Bar">';
		for($i = 1; $i <= $Vragen; $i++)
		{
			if($i == $_GET['Opgave']) echo '<li class="Current"><a href="#">'.$i.'</a></li>';
			else echo '<li><a href="index.php?P=StartToets&Opgave='.$i.'">'.$i.'</a></li>';
		}
		echo '</ul>';
			if($_GET['Opgave'] != $Vragen) echo '<form method="post" action="index.php?P='.$P.'&Opgave='.($_GET['Opgave'] + 1).'&VOpgave='.$_GET['Opgave'].'">';
			else echo '<form method="post" action="index.php?P=ToetsResultaat&VOpgave='.$_GET['Opgave'].'">';
			echo '<div class="Opgave">
					<p>'.$_SESSION['FirstNumber'][($_GET['Opgave'] - 1)].' '.$_SESSION['Sort'][($_GET['Opgave'] - 1)].' '.$_SESSION['SecondNumber'][($_GET['Opgave'] - 1)].' ='.'</p>';
					if(!isset($_SESSION['Antwoord'][($_GET['Opgave'] - 1)])) echo '<input id="myInput" type="text" name="Answer" placeholder="Antwoord" autofocus="autofocus" autocomplete="off" /></div>';
					else echo '<input id="myInput" type="text" name="Answer" placeholder="'.$_SESSION['Antwoord'][($_GET['Opgave'] - 1)].'" autofocus="autofocus" autocomplete="off" /></div>';
				if($_GET['Opgave'] == $Vragen) echo '<input class="RightButton" type="submit" name="Next" value="Inleveren" />';
				else echo '<input class="RightButton" type="submit" name="Next" value="Volgende" />';
		echo '</form>';
	} ?>