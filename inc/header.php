
<?php include("lib/Database.php");?>
<?php include("config/config.php");?>
<?php include("helpers/format.php");?>
<?php
$fm=new format;
$db=new Database;
?>


<!DOCTYPE html>
<html>
<head>
	
	<?php include "script/meta.php"; ?>
	<?php include "script/css.php"; ?>
	<?php include "script/js.php"; ?>
	
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<?php
				$selectquery="SELECT * FROM  title_slogan";
				$query=$db->select($selectquery);
				if($query)
				{
					while ($result=$query->fetch_assoc()) {
						
				?>
				<img src="admin/upload/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
			<?php }} ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php
				$selectquery="SELECT * FROM social";
				$query=$db->select($selectquery);
				if($query)
				{
					while ($result=$query->fetch_assoc()) {
						
				?>
				<a href=" <?php echo $result['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php }} ?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<?php 
		$path=$_SERVER["SCRIPT_FILENAME"];
		$title=basename($path, '.php');
		?>
		<li><a <?php if ($title == 'index') {  echo 'id="active"';}?> href="index.php">Home</a></li>
		                 <?php
                        $Cat="SELECT * FROM pages";
                        $query=$db->select($Cat);
                        if($query)
                        {
                            while($result=$query->fetch_assoc())
                            {
                            ?>
                            <li><a
                            <?php 
                            if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) {
                            	echo 'id="active"';
                            }
                            ?>
                                 href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['page'] ?></a></li>
                        <?php }}?>
		<li><a <?php if ($title == 'contact') {  echo 'id="active"';}?> href="contact.php">Contact</a></li>
	</ul>
</div>
