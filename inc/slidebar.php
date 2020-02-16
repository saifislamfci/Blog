<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
						$query="SELECT * FROM db_categories ";
						$category=$db->select($query);
						if($category)
						{
						while($cat=$category->fetch_assoc()){
						?>
						<li><a href="posts.php?catgory=<?php echo $cat['id']; ?>"><?php echo $cat['name'];?></a></li>
					<?php }}?>

					</ul>
						</div>		
						<h2 style="color: #352f2f;background: #E2A535; padding: 7px;">Latest Artical</h2>
						
					   <?php
						$query="SELECT * FROM db ORDER BY id DESC limit 3 ";
						$leteast=$db->select($query);
						if($leteast)
						{
						while($result=$leteast->fetch_assoc())
						{
							
						?>
				<div class="sameposts clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				
				 <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				<p>
				<?php echo $fm->textshort($result['body'],100);?>
				</p>
			</div>
						
					<?php }}?>
			
		</div>