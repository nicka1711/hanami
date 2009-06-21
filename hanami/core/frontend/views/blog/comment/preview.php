<h4><?php echo $comment->username?></h4>
<p><?php Gravatar::factory($comment->email)->render();?>
<p><?php echo $comment->message ?></p>