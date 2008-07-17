<div id="blog">
  <p><?php echo (isset($admin) and $admin === TRUE) ? html::anchor('/blog_admin_demo/article', 'create a new article') : '' ?></p>

  <h1>List of all articles</h1>

  <ul>
<?php 

	foreach($articles as $article): 

?>
    <li><?php echo html::anchor(sprintf('/blog_demo/article/%d', $article->id), $article->title) ?></li>
<?php

	endforeach; 

?>
  </ul>

<?php

	echo $pagination

?>

</div>