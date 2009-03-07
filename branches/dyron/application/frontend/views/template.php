<?php echo $doctype ?>

  <head>
    <meta http-equiv="Content-Type" content="<?php echo $content_type ?>; charset=<?php echo $charset ?>"/>

<?php 

	/*echo $scripts;*/
	//echo '    '.$styles;

?>
    <link type="text/css" rel="stylesheet" media="screen" href="/styles/screen.css"/>

    <link rel="icon" type="image/jpeg" href="/hanami.jpg"/>

    <title><?php echo $page_title ?></title>

  </head>

  <body>
    <div id="<?php echo $page_id ?>">
      <div id="header">
        <h1>Hanami</h1>

        <h2><?php echo $title ?></h2>

        <!-- @todo replace hard-coded admin link -->
        <ul>
			<li><a href="http://admin.<?php echo $_SERVER['HTTP_HOST']?>"><?php echo Kohana::lang('hanami.administration') ?></a></li>
		</ul>
      </div>

<?php echo $navigation ?>

      <div id="content">
<?php echo $content ?>

      </div>

    <p class="copyright hanami">
        Powerd by HanamiCMS v{hanami_version}<br/>
        Copyright &copy;<?php echo date('Y'); ?> Hanami Team</p>
    <p class="copyright kohana">
        Rendered in {execution_time} seconds, using {memory_usage} of memory<br/>
        Copyright &copy;2007-<?php echo date('Y'); ?> Kohana Team</p>
</div>
</body>
</html>
