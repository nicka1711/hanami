<p><a href="<?php echo url::site('installation/license') ?>">&laquo; Back</a></p>

<form action="<?php echo url::site(Router::$current_uri) ?>" method="post">
  <fieldset>
    <legend><?php echo Kohana::lang('install.server_data') ?></legend>


    <div>
      <label for="server_name"><?php echo Kohana::lang('install.server_name') ?></label>
      <input type="text" id="server_name" name="server[name]"/>
    </div>

    <div>
      <label for="docroot"><?php echo Kohana::lang('install.docroot') ?></label>
      <input type="text" id="docroot" name="docroot"/>
    </div>

    <!--<div>
      <label for="server_name"><?php //echo Kohana::lang('install.server_name') ?></label>
      <input type="text" id="server_name" name="server[name]"/>
    </div>

    <div>
      <label for="server_name"><?php //echo Kohana::lang('install.server_name') ?></label>
      <input type="text" id="server_name" name="server[name]"/>
    </div>-->

    <div>
      <button type="submit" id="next" name="next"><?php echo Kohana::lang('install.next') ?></button>
    </div>

    <div>
      <button type="submit" id="send" name="send">&raquo; Next</button>
    </div>
  </fieldset>
</form>