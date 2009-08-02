<ul>
<?php

	foreach($archive as $year => $months):
		$url = sprintf('/blog/archive/%d', $year);

?>
  <li>
    <h3><?php echo html::anchor($url, $year); ?></h3>
    <ul>
<?php

		foreach($months as $month => $articles):
			$url = sprintf('/blog/archive/%d/%s', $year, strftime('%m', strtotime($month)));

?>
      <li>
        <h4><?php echo html::anchor($url, $month); ?></h4>
        <ul style="list-style: outside disc; margin-left: 1.5em;">
<?php

			foreach($articles as $article):
				$url = sprintf('/blog/%s/%s', strftime('%Y/%m/%d', strtotime($article->posted)), $article->url);

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