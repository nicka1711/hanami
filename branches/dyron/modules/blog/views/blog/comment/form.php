<form action="/<?php echo url::current() ?>#comments" method="post">
<fieldset>
  <h5 id="respond">Einen Kommentar schreiben</h5>

<?php

	if (isset ($errors)):
		foreach($errors as $key => $value):

?>
  <p class="error"><?php echo Kohana::lang('error.'.$key.'.'.$value); ?></p>
<?php

		endforeach;
	endif;

?>

  <div class="<?php if (isset($errors['username'])) echo $errors['username'] ?>">
    <label for="username"><?php echo Kohana::lang('comment.username') ?></label>
    <input type="text" id="username" name="comment[username]" value="<?php echo html::specialchars($comment['username']) ?>"/>
  </div>

  <div class="<?php if (isset($errors['email'])) echo $errors['email'] ?>">
    <label for="email"><?php echo Kohana::lang('comment.email') ?></label>
    <input type="text" id="email" name="comment[email]" value="<?php echo html::specialchars($comment['email']) ?>"/>
  </div>

  <div class="<?php if (isset($errors['website'])) echo $errors['website'] ?>">
    <label for="website"><?php echo Kohana::lang('comment.website') ?></label>
    <input type="text" id="website" name="comment[website]" value="<?php echo html::specialchars($comment['website']) ?>"/>
  </div>

  <div class="<?php if (isset($errors['message'])) echo $errors['message'] ?>">
    <label for="message"><?php echo Kohana::lang('comment.message') ?></label>
    <textarea id="message" name="comment[message]" rows="10" cols="50"><?php echo html::specialchars($comment['message']) ?></textarea>
  </div>

  <div>
    <input type="submit" id="send" name="send" value="<?php echo Kohana::lang('comment.send') ?>"/>
    <input type="hidden" id="required" name="required" value="username,email,message"/>
  </div>

</fieldset>
</form>