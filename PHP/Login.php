<?php $Users = array('Jesse', 'Dewin', 'Hans', 'Remzi'); $Groep = array(6, 4, 5, 1);

	if(isset($_COOKIE['Name']) && isset($_POST['Logout']))
		{
		setcookie("Name", 0, time()-1000);
		setcookie("Group",0, time()-1000);
		header("Location: index.php?P=Home");
		return 1;
		}
	else if(isset($_COOKIE['Name']))
		{
		echo	'<div class="login">
					<form method="post" action="index.php?P=Home">
						<p>Welkom, '.$_COOKIE['Name'].'! (Groep '.$_COOKIE['Group'].')</p>
						<input class="button" type="submit" value="Uitloggen" />
						<input type="hidden" name="Logout" value="1" />
					</form>
				</div>';
		return 1;
		}
	else if(!isset($_POST['Name']) && !isset($_COOKIE['Name']))
		{
		echo	'<div class="login">
					<form method="post" action="index.php?P=Home">
						<input type="text" placeholder="Naam" name="Name" autocomplete="off" required="required" />
						<input type="password" placeholder="Wachtwoord" name="Password" required="required" />
						<input class="button" type="submit" value="Inloggen" />
				    </form>
			    </div>';
		return 1;
		}
	else if(isset($_POST['Name']) && !isset($_COOKIE['Name']))
		{
		foreach($Users as $Index => $Value)
			{
			if(!strcasecmp($Value, $_POST['Name']))
				{
				setcookie("Name", $Value, (time()+(3600*24)));
				setcookie("Group", $Groep[$Index], (time()+(3600*24)));
				header("Location: index.php?P=Home");
				return 1;
				}
			}
		echo	'<div class="login">
					<form method="post" action="index.php?P=Home">
						<p>Onbekende gebruiker!</p>
						<input type="text" placeholder="Naam" name="Name" required />
						<input type="password" placeholder="Wachtwoord" name="Password" required />
						<input class="button" type="submit" value="Inloggen" />
					</form>
				</div>';
		return 1;
		} ?>