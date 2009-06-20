<ul>
<?php

	foreach($list as $year => $months):

?>
  <li>
    <h3><?php echo $year; ?></h3>
    <ul>
<?php

		foreach($months as $month => $articles):

?>
      <li>
        <h4><?php echo $month; ?></h4>
        <ul style="list-style: outside disc; margin-left: 1.5em;">
<?php

			foreach($articles as $article):
				$url = url::site(sprintf('blog_demo/article/%d', (int) $article->id));

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

<p><?php echo html::anchor('blog_admin_demo/article', 'Create a new article') ?>, <?php echo html::anchor('blog_demo/articles', 'list all articles') ?> or <?php echo html::anchor('blog_demo/archive', 'view the archive') ?>.</p>