    <div id="comments">


<?php //if ((bool) @$_SESSION['logged_in']): ?>

<h4><?php echo Kohana::lang('blog.comments') ?></h4>
<?php echo $form ?>
<?php 

echo Kohana::debug($comments);

?>
    </div>

