<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="width:5%;">serial No.</th>
							<th style="width:15%;">Name</th>
							<th style="width:15%;">UserName</th>
							<th style="width:15%;">email</th>
							<th style="width:25%;">details</th>
							<th style="width:10%;">Role</th>
							<th style="width:10%;">Action</th>

						</tr>
					</thead>
					<tbody>
						<?php 
							if(isset($_GET['deleteid']))
							{
							$id=$_GET['deleteid'];
							$delquery="DELETE FROM db_user WHERE id='$id' ";
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
							<?php 
							$selectquery="SELECT * FROM db_user";
							$query=$db->select($selectquery);
							if ($query) 
							{
								$i=0;
								while ($result=$query->fetch_assoc()) {
									$i++;
							 ?>
						<tr class="odd gradeX">
							<td><?php 	echo $i; ?>					</td>
							<td><?php 	echo $result['name']; ?>		</td>
							<td ><?php 	echo $result['username'];?>	</td>
							<td ><?php 	echo $result['email']; ?>	</td>
							<td><?php 	echo $fm->textshort( $result['details'],50);?>	</td>
						
							
							<td ><?php 	echo $result['role']; ?>	</td>
							<td><a href="userview.php?edit=<?php echo $result['id'];?>">View</a> 

								<?php if(session::get('userid')== '0') {?>
								<a  onclick="return confirm('Are you sure DELETE');" href="?deleteid=<?php echo $result['id'];?>"> || Delete</a></td>
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
