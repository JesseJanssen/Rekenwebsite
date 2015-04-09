<?php ob_start(); session_start(); 
		if(!isset($_GET['P'])) $P = "Home";
		else $P = $_GET['P']; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Rekenwebsite</title>
		 <link rel="stylesheet" href="../CSS/stylesheet.css">
		 <script src="../JS/copy.js"></script>
		 <link rel="shortcut icon" type="image/x-icon" href="../IMG/favicon.ico" />
	</head>
	<body  oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
		<div class="background">
			<div class="page">
				<header>
				   <img src="../IMG/logo.png" />
				<?php	include '../PHP/Login.php';	?>
				</header>
				<?php	include '../PHP/Menu.php';
						include '../PHP/Content.php'; ?>
				<footer>
					<p>&copy; 2014 - <?php echo date("Y") ?> Jesse & D&eacute;win</p>
				</footer>
			</div>
		</div>
	</body>
</html>