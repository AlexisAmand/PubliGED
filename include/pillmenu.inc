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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">

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
		?>

        <a class="nav-link" href="index.php?page=blog"><?php echo PILLMENU_1; ?></a>

      	</li>

      	<?php
		if ($PageActive == '2') 
			{
			echo '<li class="nav-item active">';
			} 
		else 
			{
			echo '<li class="nav-item">';
			}
		?>
      	  
	    <a class="nav-link" href="index.php?page=patro"><?php echo PILLMENU_2; ?></a>
      	
		</li>
      
		<?php
		if ($PageActive == '3') 
			{
			echo '<li class="nav-item active">';
			} 
		else 
			{
			echo '<li class="nav-item">';
			}
		?>

        <a class="nav-link" href="index.php?page=contact"><?php echo PILLMENU_3; ?></a>

      	</li>

    </ul>

	<form class="form-inline my-2 my-lg-0" method="GET" action="index.php">
		<input class="form-control mr-sm-2" type="text"	placeholder="Recherche" name="recherche" value="recherche" onclick="this.value = '';">
		<input type="hidden" name="page" value="search">
		<input type="hidden" name="type" value="1">
		<button class="btn btn-secondary my-2 my-sm-0" type="submit" value="ok">
			<i class="fa fa-search"></i>
		</button>
	</form>

  </div>
</nav>