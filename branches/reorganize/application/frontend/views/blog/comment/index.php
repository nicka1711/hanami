    <div id="comments">


<?php //if ((bool) @$_SESSION['logged_in']): ?>

<h4><?php echo Kohana::lang('blog.comments') ?></h4>
<?php 
foreach($comments as $comment):
echo View::factory('blog/comment/preview')->set('comment', $comment);
endforeach;
?>
<?php echo $form ?>
    </div>

