    <div id="comments">


<?php //if ((bool) @$_SESSION['logged_in']): ?>

<h4><?php echo Kohana::lang('blog.comments') ?></h4>
<?php if (true or (bool) $article->allow_comments): ?>
<?php echo new View('comments/write', array('article' => $article)); ?>
<?php /*else: ?>
<p>No Comments allowed here.</p>
<?php endif; ?>

<?php*/ endif; ?>
<?php 

if(count($comments) > 0):
	foreach($comments as $comment): 

		echo new View('comments/comment', array('comment' => $comment));

	endforeach; 
else:

?>
  <p><?php echo Kohana::lang('comments.no_comments_available'); ?></p>
<?php

endif;

?>
    </div>

