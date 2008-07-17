<div class="blog article">
  <h3><?php echo $article->title; ?></h3>

  <dl>
    <dt class="author"><?php echo Kohana::lang('blog.author') ?></dt>
      <dd class="author"><?php echo $article->user->name ?></dd>

    <dt class="comments"><?php echo Kohana::lang('comment.comments') ?></dt>
      <dd class="comments">100</dd>
  </dl>

</div>