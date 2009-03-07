<div class="blog article">
<?php

	$url = sprintf('/blog/%s/%s', strftime('%Y/%m/%d', strtotime($article->posted)), $article->url);

?>
  <h3><?php echo html::anchor($url, $article->title); ?></h3>

  <p><?php echo date('d.m.Y H:i', strtotime($article->posted)); ?></p>

  <div class="content">
<?php echo text::auto_p($article->body) ?>
  </div>


  <p><?php echo html::anchor($url.'#comments', sprintf(Kohana::lang('blog.counted_comments'), count($article->blog_comments))); ?></p>
</div>