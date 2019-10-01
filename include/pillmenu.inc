<?php
switch ($_GET ['page']) {
	case 'blog' :
		$PageActive = 1;
		break;
	case 'patro' :
		$PageActive = 2;
		break;
	case 'contact' :
		$PageActive = 3;
		break;
	default :
		$PageActive = 1;
		break;
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light pillmenu navbar-fixed-top" style="position: absolute;top: 0;right: 0;left: 0;z-index: 1030;">

	<div class="collapse navbar-collapse">

		<ul class="navbar-nav mr-auto">
	        <?php
			
			if ($PageActive == '1') 
				{
				echo '<li class="nav-item active">';
				} 
			else 
				{
				echo '<li class="nav-item">';
				}
                                  
        	echo '<a class="nav-link" href="index.php?page=blog">'.PILLMENU_1.'</a>';
			echo '</li>';
	       
	       if ($PageActive == '2') 
	       		{
				echo '<li class="nav-item active">';
				}
			else
				{
				echo '<li class="nav-item">';
				}
			
            echo '<a class="nav-link" href="index.php?page=patro">'.PILLMENU_2.'</a>';
			echo '</li>';
			echo '<li class="nav-item"><a class="nav-link" href="administration/index.php">'.PILLMENU_3.'</a>';
			echo '</li>';
			
			if ($PageActive == '3')
				{
				echo '<li class="nav-item active">';
				}
			else
				{
				echo '<li class="nav-item">';
				}
			 
        	echo '<a class="nav-link" href="index.php?page=contact">'.PILLMENU_4.'</a>';
			echo '</li>';
			?>
		</ul>

		<form class="form-inline my-2 my-lg-0" method="POST" action="index.php?page=search">
			<input class="form-control mr-sm-2" type="text"	placeholder="Recherche" name="recherche" value="recherche" onclick="this.value = '';">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" value="ok">
				<i class="fa fa-search"></i>
			</button>
		</form>

	</div>
</nav>