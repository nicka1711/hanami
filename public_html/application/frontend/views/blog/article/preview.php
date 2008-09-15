<div class="blog article">
  <h3><?php echo html::anchor(sprintf('/blog/%s/%s', strftime('%Y/%m/%d', strtotime($article->posted)), $article->url), $article->title); ?></h3>
<?php echo Kohana::debug($article->url); ?>
  <dl>
    <dt class="author"><?php echo Kohana::lang('blog.author') ?></dt>
      <dd class="author"><?php echo $article->user->name ?></dd>

    <dt class="comments"><?php echo Kohana::lang('comment.comments') ?></dt>
      <dd class="comments">100</dd>
  </dl>

</div>