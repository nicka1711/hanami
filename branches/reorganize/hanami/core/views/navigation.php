<!-- @todo replace inline styles -->
<ul id="navigation" style="text-align: right; overflow: hidden;">
  <li style="float: left;"><a href="<?php echo url::site('/') ?>"><?php echo Kohana::lang('hanami.home_page'); ?></a></li>
  <li style="float: left;"><a href="<?php echo url::site('/blog') ?>"><?php echo Kohana::lang('blog.blog'); ?></a><ul>
  <li><a href="<?php echo url::site('/blog/archive') ?>"><?php echo Kohana::lang('blog.archive'); ?></a></li></ul></li>
  <!--<li><a href="<?php echo url::site('/forum') ?>"><?php echo Kohana::lang('forum.forum'); ?></a></li>-->

  <!-- @todo replace hard-coded admin link -->
  <li><a href="http://admin.<?php echo $_SERVER['HTTP_HOST']?>"><?php echo Kohana::lang('hanami.administration') ?></a></li>
</ul>