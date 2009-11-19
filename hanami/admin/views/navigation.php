<ul id="navigation">
  <li><a href="<?php echo url::site('/dashboard') ?>"><?php echo __('Dashboard'); ?></a></li>
  <li><a href="<?php echo url::site('/blog') ?>"><?php echo __('Blog'); ?></a></li>
  <li><a href="<?php echo url::site('/settings') ?>"><?php echo __('Settings'); ?></a>
      <ul>
        <li><a href="<?php echo url::site('/settings/user') ?>"><?php echo __('Users'); ?></a></li>
        <li><a href="<?php echo url::site('/settings/menu') ?>"><?php echo __('Menu'); ?></a></li>
      </ul></li>
</ul>