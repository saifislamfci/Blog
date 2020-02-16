<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider Image List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="width:10%;">No.</th>
							<th style="width:20%;">Title</th>
							<th style="width:40%;">Image</th>
							<th style="width:25%;">Action</th>
							

						</tr>
					</thead>
					<tbody>

							<?php 
							$selectquery="SELECT * From slider";
							$query=$db->select($selectquery);
							if ($query) 
							{
								$i=0;
								while ($result=$query->fetch_assoc()) {
									$i++;
							 ?>
						<tr class="odd gradeX">
							<td><?php 	echo $i; ?>	</td>
							<td><?php 	echo $result['title']; ?>	</td>
						<td><img src="upload/<?php echo $result['image']; ?>" height="40px" width="70px"></td>
		
							<td>
								<a  href="editimage.php?edit=<?php echo $result['id'];?>">Edit</a>||
								<a onclick="return confirm('Are you sure DELETE');" href="?deleid=<?php echo $result['id'];?>">Delete</a>
							</td>
							</tr>
						<?php }}?>
						<?php
						if (isset($_GET['deleid'])) 
						{
						$id=$_GET['deleid'];
						$delquery="DELETE FROM slider WHERE id='$id' ";
						$delquery=$db->delete($delquery);
						if ($delquery) {
						echo " Delete successful ";
									}
							else
								{
						echo "No Delete";
								}
						}

						?>
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
