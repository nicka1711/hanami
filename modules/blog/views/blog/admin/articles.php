<div id="blog">
  <h1>List of all articles</h1>

  <table>
<?php 

	foreach($articles as $article): 

?>
    <tr><td><?php echo html::anchor(sprintf('/blog/article/%d', $article->id), $article->title) ?></td></tr>
<?php

	endforeach; 

?>
  </table>

<?php

	echo $pagination

?>

</div>