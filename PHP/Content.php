<?php
	$Vragen = 20;

	if(isset($_POST['Next']) && is_numeric($_POST['Answer'])) $_SESSION['Antwoord'][($_GET['VOpgave'] - 1)] = $_POST['Answer'];
	if(!isset($_GET['Opgave']) && $P != 'ToetsResultaat' && $P != 'OefeningenResultaat')
		{
		unset($_SESSION['FirstNumber']);
		unset($_SESSION['Antwoord']);
		}
	echo '<div class="content">';
	if(file_exists('../PHP/Content/'.$P.'.php')) include '../PHP/Content/'.$P.'.php';
	else
		{
		echo '	<style> .content { text-align: center; } </style>
					<h1>Onze excuses</h1>
					<h3>Pagina niet gevonden.</h3>';
		}
	echo '</div>'; ?>