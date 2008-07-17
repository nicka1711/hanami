<p><?php echo html::anchor('/blog_demo/articles', 'list all articles') ?></p>

<div class="article">
<?php

	$url = sprintf('/blog_demo/article/%d', $article->id);

?>

  <h1><?php echo html::anchor($url, $article->title); ?></h1>

  <p><?php echo html::anchor(sprintf('/blog_admin_demo/article/%d', $article->id), 'Edit'); ?></p>

  <p><em><?php echo date('d.m.Y H:i', strtotime($article->posted)); ?></em> - <strong><?php echo $article->user->name; //author ?></strong></p>

  <p><?php echo html::anchor($url.'#comments', sprintf('Comments (%d)', $comments_count)); ?></p>

  <div class="content">
<?php echo text::auto_p($article->body);?>

<?php echo text::auto_p($article->extended);?>

  </div>
</div>
