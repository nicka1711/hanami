<table>
 <colgroup>
  <col class="title"/>
  <col class="author"/>
  <col class="comments"/>
  <col/>
 </colgroup>
 <tr>
  <th><?php echo __('Article title')?></th>
  <th><?php echo __('Author')?></th>
  <th><?php echo __('Comments')?></th>
  <td>&nbsp;</td>
 </tr>
<?php foreach($articles as $article): ?>
 <tr>
  <td><?php echo $article->title ?></td>
  <td><?php echo $article->author->username?></td>
  <td><?php echo count($article->blog_comments)?></td>
  <td><?php echo html::anchor('blog/article/edit/'.$article->id, __('Edit the article'))?></td>
 </tr>
<?php endforeach; ?>
</table>