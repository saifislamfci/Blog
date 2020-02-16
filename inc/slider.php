<div class="slidersection templete clear">
        <div id="slider">
        	<?php 
                  $query="SELECT * FROM  slider order by id limit 4" ;
                     $selectquery=$db->select($query);
                    while ($result=$selectquery->fetch_assoc()) { 
                ?>
            <a href="#"><img src="admin/upload/<?php echo  $result['image']; ?>" alt="nature 1" title="<?php echo  $result['title']; ?>" /></a>

             <?php }?>
        </div>

</div>