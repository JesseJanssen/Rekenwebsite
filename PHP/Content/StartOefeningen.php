<?php
	if(isset($_COOKIE['Name']))
	{
		if(isset($_POST['Sort']))
		{
			$Sort = array("+", "-", "*", "/");
			if(isset($_SESSION['FirstNumber'])) unset($_SESSION['FirstNumber']);
			if(isset($_SESSION['SecondNumber'])) unset($_SESSION['SecondNumber']);
			$_SESSION['FirstNumber'] = array();
			$_SESSION['SecondNumber'] = array();
			$Getal = 0;
			if($_COOKIE['Group'] == 4) $Getal = 10;
			else if($_COOKIE['Group'] == 5) $Getal = 20;
			else if($_COOKIE['Group'] == 6) $Getal = 100;
			for($s = 0; $s < $Vragen; $s++)
			{
				$FirstNumber = rand(1, $Getal);
				$SecondNumber = rand(1, $Getal);
				if($_POST['Sort'] == 0) $_SESSION['Answer'][$s] = ($FirstNumber + $SecondNumber);
				else if($_POST['Sort'] == 1)
				{
					if(($FirstNumber - $SecondNumber) < 0)
					{
						$Number = $SecondNumber;
						$SecondNumber = $FirstNumber;
						$FirstNumber = $Number;
					}
					$_SESSION['Answer'][$s] = ($FirstNumber - $SecondNumber);
				}
				else if($_POST['Sort'] == 2) $_SESSION['Answer'][$s] = ($FirstNumber * $SecondNumber);
				else if($_POST['Sort'] == 3)
				{
					if(isset($_SESSION['Answer'][$s])) unset($_SESSION['Answer'][$s]);
					while(!isset($_SESSION['Answer'][$s]))
					{
						$FirstNumber = rand(1, $Getal);
						$SecondNumber = rand(1, $Getal);
						if(is_integer($FirstNumber / $SecondNumber)) $_SESSION['Answer'][$s] = ($FirstNumber / $SecondNumber);
					}
				}
				$_SESSION['FirstNumber'][$s] = $FirstNumber;
				$_SESSION['Sort'][$s] = $Sort[$_POST['Sort']];
				$_SESSION['SecondNumber'][$s] = $SecondNumber;
			}
		}
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
			else echo '<form method="post" action="index.php?P=OefeningenResultaat&VOpgave='.$_GET['Opgave'].'">';
			echo '<div class="Opgave">
					<p>'.$_SESSION['FirstNumber'][($_GET['Opgave'] - 1)].' '.$_SESSION['Sort'][($_GET['Opgave'] - 1)].' '.$_SESSION['SecondNumber'][($_GET['Opgave'] - 1)].' ='.'</p>';
					if(!isset($_SESSION['Antwoord'][($_GET['Opgave'] - 1)])) echo '<input id="myInput" type="text" name="Answer" placeholder="Antwoord" autofocus="autofocus" autocomplete="off" /></div>';
					else echo '<input id="myInput" type="text" name="Answer" placeholder="'.$_SESSION['Antwoord'][($_GET['Opgave'] - 1)].'" autofocus="autofocus" autocomplete="off" /></div>';
				if($_GET['Opgave'] == $Vragen) echo '<input class="RightButton" type="submit" name="Next" value="Inleveren" />';
				else echo '<input class="RightButton" type="submit" name="Next" value="Volgende" />';
		echo '</form>';
	} ?>