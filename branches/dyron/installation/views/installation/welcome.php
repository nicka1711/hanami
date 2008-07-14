<h3><?php echo Kohana::lang('install.choose_language') ?></h3>

<p>Please choose a language which is used during the Hanami installation.</p>

<form action="<?php echo url::site(Router::$current_uri) ?>" method="post">
  <fieldset>
    <legend>Available languages</legend>
<?php foreach($langs as $lang => $label): ?>

    <div>
      <label><input type="radio" id="lang_<?php echo $lang ?>" name="lang[]" value="<?php echo $lang ?>" /><?php echo $label ?></label>
    </div>
<?php endforeach; ?>

    <div>
      <button type="submit" id="send" name="send">&raquo; Next</button>
    </div>
  </fieldset>
</form>