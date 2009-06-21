<?php echo $doctype ?>

  <head>
    <meta http-equiv="Content-Type" content="<?php echo $content_type ?>; charset=<?php echo $charset ?>"/>

    <link type="text/css" rel="stylesheet" media="screen" href="/styles/admin.css"/>

    <link type="image/x-icon" rel="icon" href="/favicon.ico"/>
    <link type="image/x-icon" rel="shortcut icon" href="/favicon.ico"/>

    <title><?php echo $page_title ?></title>

  </head>

  <body class="admin">
    <div id="page">
      <div id="header">
        <h1>Administration</h1>
<?php echo $navigation ?>
      </div>

<?php echo $content ?>

    </div>
  </body>
</html>