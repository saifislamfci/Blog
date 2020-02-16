<?php if(isset($_GET['pageid']))
			{
				$id=$_GET['pageid'];
				$selectquery="SELECT * FROM  pages where id='$id'";
				$query=$db->select($selectquery);
				if($query)
				{
					while ($result=$query->fetch_assoc()) {
	?>
							<title><?php echo TITLE; ?>-<?php echo $result['page']; ?></title>
				<?php } }}else{?>
			<title><?php echo TITLE; ?>-<?php echo $fm->title(); ?></title>
				<?php }?>
	
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">