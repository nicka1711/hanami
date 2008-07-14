<h3><?php echo Kohana::lang('install.choose_language') ?></h3>

<p>Please choose a language which is used during the Hanami installation.</p>

<form action="<?php echo url::site(Router::$current_uri) ?>" method="post">
  <fieldset>
    <legend><?php echo Kohana::lang('install.available_languages') ?></legend>
<?php foreach($avail_langs as $lang => $label): ?>

    <div>
      <label><input type="radio" id="lang_<?php echo $lang ?>" name="lang[<?php echo $lang ?>]" <?php echo ($lang === $accept_lang) ? 'checked="checked"' : '' ?>/><?php echo $label ?></label>
    </div>
<?php endforeach; ?>

    <div>
      <button type="submit" id="next" name="next"><?php echo Kohana::lang('install.next') ?></button>
    </div>
  </fieldset>
</form>
