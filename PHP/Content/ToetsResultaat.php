<?php
	if(isset($_COOKIE['Name']))
		{
		echo '<style> .content { text-align: center; } </style>';
		$_SESSION['Mistakes'] = 0;
		for($i = 0; $i < $Vragen; $i++) if(!isset($_SESSION['Antwoord'][$i]) || empty($_SESSION['Antwoord'][$i]) || $_SESSION['Antwoord'][$i] != $_SESSION['Answer'][$i]) $_SESSION['Mistakes'] += 1;
		$Punt = (($Vragen - $_SESSION['Mistakes']) / 2);
		if($Punt >= 5.5) echo '<h1>Geslaagd!</h1>';
		else echo '<h1>Niet geslaagd!</h1>';
		if($Punt < 1) $Punt = 1;
		echo '<p>Cijfer: '.$Punt.'<br /><br /></p>';
		echo '<table>
		<tr>
			<th colspan="2"></th>
			<th colspan="2">Antwoord</th>
			<th class="space"></th>
			<th colspan="2"></th>
			<th colspan="2">Antwoord</th>
		</tr>
		<tr>
			<th>#</th>
			<th>Vraag</th>
			<th>Juiste</th>
			<th>Gegeven</th>
			<th class="space"></th>
			<th>#</th>
			<th>Vraag</th>
			<th>Juiste</th>
			<th>Gegeven</th>
		</tr>';
		for($i = 0; $i < ($Vragen / 2); $i++)
			{
			if(!isset($_SESSION['Antwoord'][$i]))	echo '	<tr>
																<td class="wrong">'.($i + 1).'</td>
																<td class="wrong">'.$_SESSION['FirstNumber'][$i].' '.$_SESSION['Sort'][$i].' '.$_SESSION['SecondNumber'][$i].'</td>
																<td class="wrong">'.$_SESSION['Answer'][$i].'</td>
																<td class="wrong">&nbsp;</td>';

			else if($_SESSION['Answer'][$i] == $_SESSION['Antwoord'][$i])	echo '	<tr>
																					<td class="good">'.($i + 1).'</td>
																					<td class="good">'.$_SESSION['FirstNumber'][$i].' '.$_SESSION['Sort'][$i].' '.$_SESSION['SecondNumber'][$i].'</td>
																					<td class="good">'.$_SESSION['Answer'][$i].'</td>
																					<td class="good">'.$_SESSION['Antwoord'][$i].'</td>';

			else	echo '	<tr>
								<td class="wrong">'.($i + 1).'</td>
								<td class="wrong">'.$_SESSION['FirstNumber'][$i].' '.$_SESSION['Sort'][$i].' '.$_SESSION['SecondNumber'][$i].'</td>
								<td class="wrong">'.$_SESSION['Answer'][$i].'</td>
								<td class="wrong">'.$_SESSION['Antwoord'][$i].'</td>';

			if (!isset($_SESSION['Antwoord'][($i + 10)]))	echo '	<td class="space"></td>
																	<td class="wrong">'.($i + 11).'</td>
																	<td class="wrong">'.$_SESSION['FirstNumber'][($i + 10)].' '.$_SESSION['Sort'][($i + 10)].' '.$_SESSION['SecondNumber'][($i + 10)].'</td>
																	<td class="wrong">'.$_SESSION['Answer'][($i + 10)].'</td>
																	<td class="wrong">&nbsp;</td>
																</tr>';

			else if($_SESSION['Answer'][($i + 10)] == $_SESSION['Antwoord'][($i + 10)])	echo '	<td class="space"></td>
																							<td class="good">'.($i + 11).'</td>
																							<td class="good">'.$_SESSION['FirstNumber'][($i + 10)].' '.$_SESSION['Sort'][($i + 10)].' '.$_SESSION['SecondNumber'][($i + 10)].'</td>
																							<td class="good">'.$_SESSION['Answer'][($i + 10)].'</td>
																							<td class="good">'.$_SESSION['Antwoord'][($i + 10)].'</td>
																						</tr>';

			else	echo '	<td class="space"></td>
							<td class="wrong">'.($i + 11).'</td>
							<td class="wrong">'.$_SESSION['FirstNumber'][($i + 10)].' '.$_SESSION['Sort'][($i + 10)].' '.$_SESSION['SecondNumber'][($i + 10)].'</td>
							<td class="wrong">'.$_SESSION['Answer'][($i + 10)].'</td>
							<td class="wrong">'.$_SESSION['Antwoord'][($i + 10)].'</td>
						</tr>';
			}
		echo '</table>';
		} ?>