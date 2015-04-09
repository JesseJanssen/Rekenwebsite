<?php
	if(isset($_COOKIE['Name']))
		{
		echo '<style> .content { text-align: center; } </style>';

		function RandomFreeSlot()
		{
			global $Vragen;
			$FreeSlot = array();
			for($i = 0; $i < $Vragen; $i++) if(!isset($_SESSION['FirstNumber'][$i])) $FreeSlot[] = $i;
			return $FreeSlot[rand(0, (count($FreeSlot)-1))];
		}

		$Sort = array("+", "-", "*", "/");
		if(isset($_SESSION['FirstNumber'])) unset($_SESSION['FirstNumber']);
		if(isset($_SESSION['Sort'])) unset($_SESSION['Sort']);
		if(isset($_SESSION['SecondNumber'])) unset($_SESSION['SecondNumber']);
		if(isset($_SESSION['Answer'])) unset($_SESSION['Answer']);
		if(isset($_SESSION['Antwoord'])) unset($_SESSION['Antwoord']);
		$_SESSION['FirstNumber'] = array();
		$_SESSION['Sort'] = array();
		$_SESSION['SecondNumber'] = array();
		$_SESSION['Answer'] = array();
		$Getal = 0;
		if($_COOKIE['Group'] == 4) $Getal = 10;
		else if($_COOKIE['Group'] == 5) $Getal = 20;
		else if($_COOKIE['Group'] == 6) $Getal = 100;
		for($i = 0; $i < 4; $i++)
			{
			for($s = 0; $s < 5; $s++)
				{
				$Slot = RandomFreeSlot();
				$FirstNumber = rand(1, $Getal);
				$SecondNumber = rand(1, $Getal);
				if($i == 0) $_SESSION['Answer'][$Slot] = ($FirstNumber + $SecondNumber);
				else if($i == 1)
					{
					if(($FirstNumber - $SecondNumber) < 0)
						{
						$Number = $SecondNumber;
						$SecondNumber = $FirstNumber;
						$FirstNumber = $Number;
						}
					$_SESSION['Answer'][$Slot] = ($FirstNumber - $SecondNumber);
					}
				else if($i == 2) $_SESSION['Answer'][$Slot] = ($FirstNumber * $SecondNumber);
				else if($i == 3)
					{
					if(isset($_SESSION['Answer'][$Slot])) unset($_SESSION['Answer'][$Slot]);
					while(!isset($_SESSION['Answer'][$Slot]))
						{
						$FirstNumber = rand(1, $Getal);
						$SecondNumber = rand(1, $Getal);
						if(is_integer($FirstNumber / $SecondNumber)) $_SESSION['Answer'][$Slot] = ($FirstNumber / $SecondNumber);
						}
					}
				$_SESSION['FirstNumber'][$Slot] = $FirstNumber;
				$_SESSION['Sort'][$Slot] = $Sort[$i];
				$_SESSION['SecondNumber'][$Slot] = $SecondNumber;
				}
			}
		echo '<h1>Toets</h1>
			<p>
				Welkom bij de toets, hier gaan we kijken of je de sommen kent die je als het goed is goed geoefend hebt<br />
				Om met de toets te beginnen, klik je op de groene startknop. Als je hier op klikt dan start de toets meteen.<br />
				Zorg wel dat je de toets in één keer af maakt, anders zal je resultaat niet te zien zijn.
				<br /><br />
				<a href="index.php?P=StartToets&Opgave=1" class="button">Start toets</a>
			</p>';
		} ?>