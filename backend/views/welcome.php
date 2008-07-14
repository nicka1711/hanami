<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<title><?php echo $title ?></title>

<style type="text/css">
html {
	margin: 0;
	padding: 0;
	background: #96ADCF url('<?php echo url::base(FALSE).'html.jpg' ?>') top left repeat-x;		 	
	height: 100%;
}

body { 
	height: 100%;
	margin: 0;
	padding: 0;
	background: transparent url('<?php echo url::base(FALSE).'body.jpg' ?>') top left no-repeat;		 
	font-size: 76%;
	font-family: Arial, Verdana, sans-serif; 
	color: #111; 
	line-height: 1.5; 
	text-align: center; 
}

div#wrapper { 
	width: 700px; 
	margin: 0 auto;
	padding: 0 2em 0 2em;
}

div, h2, a, p, code, ul { font-family: inherit; color: inherit; padding: 0; margin: 0; text-align: baseline; text-decoration: none; }
h2 { 
	padding: 100px 0 0; 
}
a { text-decoration: underline; }
ul { list-style: none; padding: 1em 0; }
ul li { display: inline; padding-right: 1em; }
ul li:before { content: '» '; }
code { color: #381a0c; }
p.intro { padding: 1em 0; font-size: 1.2em; }
p.copyright { font-size: 0.8em; text-transform: uppercase; color: #44640b; }
</style>

</head>
<body>
<div id='wrapper'>
<h2><?php echo $title ?></h2>
<?php echo $content ?>

<ul>
<?php foreach ($links as $title => $url): ?>
<li><?php echo html::anchor($url, $title) ?></li>
<?php endforeach ?>
</ul>

<p class="copyright">Rendered in {execution_time} seconds, using {memory_usage} of memory<br/>Copyright &copy;2007-2008 Kohana Team</p>
</div>
</body>
</html>