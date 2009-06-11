<div class="article">
<?php

	$url = sprintf('/blog/%s/%s', strftime('%Y/%m/%d', strtotime($article->posted)), $article->url);

?>

  <h3><?php echo html::anchor($url, $article->title); ?></h3>

  <p><em><?php echo date('d.m.Y H:i', strtotime($article->posted)); ?></em> - <strong><?php echo $article->user->username ?></strong></p>

  <p><?php echo html::anchor($url.'#comments', sprintf('Comments (%d)', $comment_count)); ?></p>

  <div class="content">
<?php echo text::auto_p($article->body);?>

<?php echo text::auto_p($article->extended);?>

  </div>

<?php echo $comments ?>

</div>