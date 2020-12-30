<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
	</head>
	<body>
	  <form action="" method="post">
	  <input type='text' class='col-xs-2 form-control' Placeholder='Enter Address' name="ah" value=''/>
	  <button type='submit' name="edit" class='btn-primary btn-sm' value="">func1</button>
	  <button type='submit' class='btn-primary btn-sm'  onclick='fun2()'><i class='fa fa-save'>func2</button>
	  </form>
	</body>
	
	<?php
edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' );
	 ?>


</html>
