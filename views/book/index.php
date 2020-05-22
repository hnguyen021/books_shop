
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="?controller=book&action=index">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group" id="lol">
				

				
		  <?php
				  //foreach($book as $b){
					///$count = count($book);
					  for($i =0;$i<count($bookss);$i++){
						
					  ?>
					  
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="?controller=book&action=preview&id=<?= $bookss[$i]->idsach?>"><img src="<?= $bookss[$i]->hinhsach?>" alt="" /></a>
					 <h2><?= $bookss[$i]->tensach?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"><?= $bookss[$i]->giasach?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="?controller=book&action=preview&id=<?= $bookss[$i]->idsach?>">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>
				<?php
				
						}
					//	$count = $count - 8;
						
						
				?>
				
    </div>
	
	<div style="margin-left:40%" >
				<?php
					for($i=1;$i<=$page;$i++){
						
				?>
				
				<a href="?controller=book&action=index&page=<?=$i?>"><button id ="btn-prev" type="button" class="btn btn-outline-success"><?=$i?></button></a>
				 
				<!--<button type="button" class="btn btn-outline-warning">2</button>!-->
				<?php
					}
				?>
	</div>
 </div>


	