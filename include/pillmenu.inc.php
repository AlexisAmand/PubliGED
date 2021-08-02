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
<div class="container-fluid">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">

  	<ul class="navbar-nav me-auto mb-2 mb-lg-0">

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

	<form class="d-flex" method="GET" action="index.php">
		<input class="form-control me-2" type="search" placeholder="Recherche" name="recherche" value="recherche" onclick="this.value = '';">
		<input type="hidden" name="page" value="search">
		<input type="hidden" name="type" value="1">
		<button class="btn btn-primary" type="submit" value="ok">
			<i class="fa fa-search"></i>
		</button>
	</form>
    </div>
  </div>
</nav>