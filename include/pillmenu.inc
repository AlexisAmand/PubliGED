     <ul class="nav navbar-nav">
      	<li><a href="index.php?page=blog"><?php echo PILLMENU_1 ?></a>
		</li>
		<li><a href="index.php?page=patro"><?php echo PILLMENU_2 ?></a>
		</li>
		<li><a href="admin/index.php"><?php echo PILLMENU_3 ?></a>
		</li>
		<li><a href="index.php?page=contact"><?php echo PILLMENU_4 ?></a>
		</li>
	 </ul>	
		
	 <form method="POST" action="index.php?page=search" class="navbar-form navbar-right">

		<div class="form-group">
    		<input type="text" name="recherche" value="recherche" class="form-control" 
    		onclick="this.value = '';">
       		<input type="submit" value="ok" class="btn btn-default">
   		</div>
	
	 </form>