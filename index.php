<?php include("inc/header.php");?>
<?php include("inc/slider.php");?>
<?php
	$per_page=3;
	if (isset($_GET['page']))
		{
	      $page=$_GET['page'];
		}
	else
	  {
		  $page=1;
	  }
	$start_page=($page-1)* $per_page;
	echo $start_page;
?>

<?php 
	$query="SELECT * FROM db limit $start_page,$per_page";
	$post=$db->select($query);
?>	
<!---pagmentetion---->
<!---pagmentetion---->
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php if($post) {
				while ($result=$post->fetch_assoc()){
			 ?>
			<div class="samepost clear">
						<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
						<h4><?php echo $fm->formatdate($result['date']);?> By <a href="#"><?php echo $result['autor'];?></a></h4>
						 <a href="#"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
						<p>
						   <?php echo $fm->textshort($result['body'],500);?>
						</p>
					<div class="readmore clear">
						<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
					</div>
				</div>

				<?php 
				//pagination
					$query="SELECT * FROM db";
					$query=$db->select($query);
					$total_row=mysqli_num_rows($query);
				?>
				<?php
				$total_page=ceil($total_row/$per_page);
				 ?>
				<?php } ?><!---end while loop---->
				<?php echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>"?>
				<?php
					for ($i=1; $i <=$total_page ; $i++) { 
					echo "<a href='index.php?page=$i'>".$i.''."</a>";}
				?>			
				<?php echo "<a href='index.php?page=$total_page'>".'Lest page'."</a> <span>"?>
				
			<?php } else{header("Location:404.php");}?>
		</div>
		<?php include("inc/slidebar.php");?>
	</div>
<?php include("inc/footer.php");?>
<?php include("inc/copyright.php");?>


	

