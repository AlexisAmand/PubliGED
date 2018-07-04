		<?php 
		
		switch($_GET['page'])
			{
			case 'blog':
				$PageActive = 1;
				break;
			case 'patro':
				$PageActive = 2;
				break;
			case 'contact':
				$PageActive = 3;
				break;
			default:
				$PageActive = 1;
				break;
			}
				
		?>
			
		<nav class="navbar navbar-expand-lg navbar-light bg-light pillmenu">
		
                <div class="collapse navbar-collapse">
                
                  <ul class="navbar-nav mr-auto">
                  	<?php 
                  	if ($PageActive=='1')
                  		{
                  		echo '<li class="nav-item active">';
                  		}
                  	else 
                  		{
                  		echo '<li class="nav-item">';
                  		}
                  	?>                                    
                    	<a class="nav-link" href="index.php?page=blog"><?php echo PILLMENU_1 ?></a>
                    </li>
                    <?php 
                  	if ($PageActive=='2')
                  		{
                  		echo '<li class="nav-item active">';
                  		}
                  	else 
                  		{
                  		echo '<li class="nav-item">';
                  		}
                  	?> 
                      <a class="nav-link" href="index.php?page=patro"><?php echo PILLMENU_2 ?></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="admin/index.php"><?php echo PILLMENU_3 ?></a>
                    </li>
                    <?php 
                  	if ($PageActive=='3')
                  		{
                  		echo '<li class="nav-item active">';
                  		}
                  	else 
                  		{
                  		echo '<li class="nav-item">';
                  		}
                  	?> 
                      <a class="nav-link" href="index.php?page=contact"><?php echo PILLMENU_4 ?></a>
                    </li>
                  </ul>
                  
                  <form class="form-inline my-2 my-lg-0" method="POST" action="index.php?page=search" >
                    <input class="form-control mr-sm-2" type="text" placeholder="Recherche" name="recherche" value="recherche" onclick="this.value = '';">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit" value="ok"><i class="fas fa-search"></i></button>
                  </form>
                  
                </div>
		</nav>