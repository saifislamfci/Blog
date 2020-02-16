<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox message</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="text-align: left; width: 10%;">Serial No.</th>
							<th style="text-align: left; width: 20%;">Name</th>
							<th style="text-align: left; width: 10%;">Email</th>
							<th style="text-align: left; width: 25%;">Message</th>
							<th style="text-align: left; width: 15%;">Date</th>
							<th style="text-align: left; width: 20%;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (isset($_GET['seenid'])) 
						{
							$id=$_GET['seenid'];
						  $update="UPDATE  contect_us
                            SET status='1'
                            WHERE id='$id'";
                    $updatedata=$db->update($update);
                    if ($updatedata) {
                        echo "Your data have seen box";
                    }
                    else
                    {
                        echo "some thing problem";
                    }	
						}

						?>
						<?php 
						$messquery="SELECT * FROM contect_us WHERE status='0' order by id desc";
						$query=$db->select($messquery);
						if($query)
						{
							$i=0;
							while($mes=$query->fetch_assoc())
							{
						$i++;


						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $mes['fname'].' '.$mes['lname']; ?></td>
							<td><?php echo $mes['email'];?>||</td>
							<td><?php echo $fm->textshort($mes['body'],30); ?> </td>
							<td><?php echo $fm->formatdate($mes['date']); ?></td>
							<td><a href="viewmsg.php?msgid=<?php echo $mes['id'];?>">veiw||</a> || <a href="replymsg.php?replyid=<?php echo $mes['id'];?>">Reply</a>||<a href="?seenid=<?php echo $mes['id'];?>">Seen</a></td>
						</tr>
					<?php }}?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
             <div class="grid_10">
            <div class="box round first grid">
                <h2>Seen message</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="text-align: left; width: 10%;">Serial No.</th>
							<th style="text-align: left; width: 20%;">Name</th>
							<th style="text-align: left; width: 10%;">Email</th>
							<th style="text-align: left; width: 25%;">Message</th>
							<th style="text-align: left; width: 15%;">Date</th>
							<th style="text-align: left; width: 20%;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_GET['deleteid'])) {
							$id=$_GET['deleteid'];
							$delquery="DELETE FROM contect_us WHERE id='$id' ";
							$delquery=$db->delete($delquery);
							if ($delquery) {
							echo " Delete successful ";
							}
						}
						?>
						<?php 
						$messquery="SELECT * FROM contect_us WHERE status='1' order by id desc";
						$query=$db->select($messquery);
						if($query)
						{
							$i=0;
							while($mes=$query->fetch_assoc())
							{
						$i++;


						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $mes['fname'].' '.$mes['lname']; ?></td>
							<td><?php echo $mes['email'];?>||</td>
							<td><?php echo $fm->textshort($mes['body'],30); ?> </td>
							<td><?php echo $fm->formatdate($mes['date']); ?></td>
							<td><a href="?deleteid=<?php echo $mes['id'];?>">delete</a></td>
						</tr>
					<?php }}?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include("inc/footer.php"); ?>