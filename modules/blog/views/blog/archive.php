<ul>
<?php

	foreach($list as $year => $month_list):

?>
  <li>
    <h3><?php echo $year; ?></h3>
    <ul>
<?php

		foreach($month_list as $month => $articles):

?>
      <li>
        <h4><?php echo $month; ?></h4>
        <ul style="list-style: outside disc; margin-left: 1.5em;">
<?php

			foreach($articles as $article):
				$url = url::site(sprintf('blog/%s/%s', date('Y/m/d', strtotime($article->posted)), $article->url));

?>
          <li><a href="<?php echo $url ?>"><?php echo $article->title; ?></a></li>
<?php

			endforeach;

?>
        </ul>
      </li>
<?php

		endforeach;

?>
    </ul>
  </li>
<?php

	endforeach;

?>
</ul>