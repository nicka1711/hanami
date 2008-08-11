<form action="<?php echo url::site(Router::$current_uri) ?>" method="post" id="login">
  <fieldset>
    <legend><?php echo Kohana::lang('auth.login')?></legend>

    <div class="clearfix">
<?php if(isset($errors['username'])): ?>      <p class="error"><?php echo $errors['username']?></p><?php endif; ?>

      <label for="username"><?php echo Kohana::lang('auth.username'); ?></label>
         <input type="text" id="username" name="username" class="text" value="<?php echo $username ?>"/></div>

    <div class="clearfix">
<?php if(isset($errors['password'])): ?>      <p class="error"><?php echo $errors['password']?></p><?php endif; ?>

      <label for="password"><?php echo Kohana::lang('auth.password'); ?></label>
      <input type="password" id="password" name="password" class="text"/></div>

    <button type="submit" id="submit" name="submit"><?php echo Kohana::lang('auth.to_login') ?></button>
  </fieldset>
</form>