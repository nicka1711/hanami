<form action="/blog/article" method="post">
  <fieldset>
    <legend><?php echo Kohana::lang('blog.write_an_article') ?></legend>
<?php

	if (isset ($errors)):
		foreach($errors as $error):

?>
          <p class="error"><?php echo $error; ?></p>
<?php

		endforeach;
	endif;

?>

    <div class="<?php if (isset($errors['title'])) echo $errors['title'] ?>">
      <label for="title"><?php echo Kohana::lang('blog.title') ?></label>
      <input id="title" name="title" value="<?php echo html::specialchars($article->title) ?>"/>
    </div>

    <div class="<?php if (isset($errors['title'])) echo $errors['title'] ?>">
      <label for="body"><?php echo Kohana::lang('blog.body') ?></label>
      <textarea id="body" name="body" cols="20" rows="5"><?php echo html::specialchars($article->body) ?></textarea>
    </div>

    <div>
      <label for="extended"><?php echo Kohana::lang('blog.extended_body') ?></label>
      <textarea id="extended" name="extended" cols="20" rows="15"><?php echo html::specialchars($article->extended) ?></textarea>
    </div>

    <div style="text-align: center;">
      <button type="submit" id="send" name="send"><?php echo Kohana::lang('blog.save') ?></button>
    </div>
  </fieldset>
</form>
