<form action="/register" method="post">
  <fieldset>
    <legend><?php echo Kohana::lang('auth.user_information') ?></legend>
<?php
	foreach($messages as $error):
		echo '<p class="error">',$error,'</p>';
	endforeach;
?>

    <div><label for="username"><?php echo Kohana::lang('auth.username'); ?></label>
         <input type="text" id="username" name="username"/></div>

    <div><label for="email"><?php echo Kohana::lang('auth.email'); ?></label>
         <input type="text" id="email" name="email"/></div>

    <div><label for="password"><?php echo Kohana::lang('auth.password'); ?></label>
         <input type="text" id="password" name="password"/></div>

    <div><label for="passconf"><?php echo Kohana::lang('auth.passconf'); ?></label>
         <input type="text" id="passconf" name="passconf"/></div>
  </fieldset>
  <fieldset>
    <input type="hidden" id="reqfields" name="reqfields" value="<?php echo $req_fields ?>"/>
    <input type="submit" id="register" name="register" value="<?php echo Kohana::lang('auth.register') ?>"/>
  </fieldset>
</form>
