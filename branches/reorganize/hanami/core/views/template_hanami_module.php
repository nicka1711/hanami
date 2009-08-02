<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css">
<?php include Kohana::find_file('views', 'hanami', FALSE, 'css') ?>
    </style>

    <title><?php echo $page_title ?></title>

  </head>

  <body>
    <div id='wrapper'>
<h1>Hanami</h1>

      <h2><?php echo $title ?></h2>
<?php echo $content ?>

<p class="copyright">Rendered in {execution_time} seconds, using {memory_usage} of memory<br/>Copyright &copy;2007-2008 Kohana Team</p>
</div>
</body>
</html>