<article class="postcontent">
<?php
	foreach ($allPost as $key => $value) {
?>	
	<div class="post">
		<h2><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['postId']; ?>"><?php echo $value['title']; ?></a></h2>
		
		
		<p>
			<?php 
				$text = $value['content']; 
				if (strlen($text)>178) 
				{
					$text = substr($text,0,178);
					echo $text;
				}
			?> 
		</p>
			
		<div class="readmore"><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['postId']; ?>">Read More...</a></div>
	</div>

<?php } ?>	

</article>






<?php //include 'sidebar.php'; ?>  

<!-- </div> -->
<!-- ******** XXXXXXX ************* -->


<?php //include 'footer.php'; ?>  