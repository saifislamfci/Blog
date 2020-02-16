<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="width:5%;">No.</th>
							<th style="width:10%;">Catagory</th>
							<th style="width:15%;">Title</th>
							<th style="width:20%;">Body</th>
							<th style="width:15%;">Image</th>
							<th style="width:5%;">Autor</th>
							<th style="width:10%;">Tags</th>
							<th style="width:10%;">date</th>
							<th style="width:10%;">setting</th>
						</tr>
					</thead>
					<tbody>
							<?php 
							$selectquery="SELECT db.*, db_categories.name FROM db
							INNER JOIN db_categories
							ON db.cat = db_categories.id
							ORDER BY db.title DESC";
							$query=$db->select($selectquery);
							if ($query) 
							{
								$i=0;
								while ($result=$query->fetch_assoc()) {
									$i++;
							 ?>
						<tr class="odd gradeX">
							<td><?php 	echo $i; ?>					</td>
							<td><?php 	echo $result['cat']; ?>		</td>
							<td ><?php 	echo $result['title'];?>	</td>
							<td><?php 	echo $fm->textshort( $result['body'],50);?>	</td>
							<td><img src="upload/<?php echo $result['image']; ?>" height="40px" width="70px"></td>
							<td><?php 	echo $result['autor']; ?>	</td>
							<td ><?php 	echo $result['tags']; ?>	</td>
							<td ><?php 	echo $result['date']; ?>	</td>



							<td><a href="viewpost.php?edit=<?php echo $result['id'];?>">View</a>
								<?php
								if (session::get('userid') == $result['user_roles']|| session::get('userRole')=='0' ) {?>
								<a href="postedit.php?edit=<?php echo $result['id'];?>">Edit</a>||
								<a href="delete.php?delid=<?php echo $result['id'];?>">Delete</a></td>
								 <?php }?>

						</tr>
						<?php }}?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
 <?php include("inc/footer.php"); ?>
