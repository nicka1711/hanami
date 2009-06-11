<div id="blog">
<?php 

	foreach($articles as $article): 

		echo View::factory('blog/article/preview', array('article' => $article));

	endforeach; 

?>

<?php echo $pagination; ?>
</div>