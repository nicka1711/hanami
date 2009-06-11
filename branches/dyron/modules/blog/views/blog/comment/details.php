<h5><em><?php echo date('d.m.Y H:i', strtotime($comment->datetime)); ?></em> - <?php echo $comment->author; ?></h5>

<p><?php echo $comment->content ?></p>