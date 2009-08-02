<h4><?php echo $comment->username?></h4>
<p><?php echo Gravatar::factory($comment->email)->render()?></p>
<p><?php echo $comment->message ?></p>