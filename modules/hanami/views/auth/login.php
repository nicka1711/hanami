<form action="/login" method="post">
  <fieldset>
    <div><label for="user_name"><?php echo Kohana::lang('auth.user_name'); ?></label>
         <input type="text" id="user_name" name="user_name" value="<?php echo @$_POST['user_name'] ?>"/></div>

    <div><label for="password"><?php echo Kohana::lang('auth.password'); ?></label>
         <input type="text" id="password" name="password"/></div>
  </fieldset>
  <fieldset>
    <input type="submit" id="login" name="login" value="<?php echo Kohana::lang('auth.login') ?>"/>
  </fieldset>
</form>