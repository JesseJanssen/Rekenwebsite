<div class="menu">
	<ul>
		<?php	$Pages = array("Home", "Help", "Oefeningen", "Toets");
			if(isset($_COOKIE['Name']))
				{
				foreach($Pages as $Value)
					{
					if($P == $Value) echo '<li class="current"><a href="#">'.$Value.'</a></li>';
					else echo '<li><a href="index.php?P='.$Value.'">'.$Value.'</a></li>';
					}
				}
			else echo '<li class="current"><a href="#">Home</a></li>'; ?>
	</ul>
</div>