<?php

// Get the day names
$days = Calendar::days();

// Previous and next month timestamps
$next = mktime(0, 0, 0, $month + 1, 1, $year);
$prev = mktime(0, 0, 0, $month - 1, 1, $year);

// Import the GET query array locally and remove the day
$qs = $_GET;
unset($qs['day']);

// Previous and next month query URIs
$prev_url = Router::$current_uri.'?'.http_build_query(array_merge($qs, array('month' => date('n', $prev), 'year' => date('Y', $prev))));
$next_url = Router::$current_uri.'?'.http_build_query(array_merge($qs, array('month' => date('n', $next), 'year' => date('Y', $next))));

?>
<table id="calendar" summary="">
  <caption><?php echo strftime('%B %Y', mktime(0, 0, 0, $month, 1, $year)) ?></caption>

  <colgroup>
    <col />
    <col />
    <col />
    <col />
    <col />
    <col class="weekend"/>
    <col class="weekend"/>
  </colgroup>
  <thead>
    <tr>
<?php foreach ($days as $day): ?>
      <th><abbr title="<?php echo $day ?>"><?php echo substr($day, 0, 2) ?></abbr></th>
<?php endforeach ?>

    </tr>
  </thead>

  <tfoot>
    <tr>
      <td class="prev" colspan="3"><?php echo html::anchor($prev_url, '&laquo; '.strftime('%B %Y', $prev)) ?></td>
      <td>&nbsp;</td>
      <td class="next" colspan="3"><?php echo html::anchor($next_url, strftime('%B %Y', $next)).' &raquo;' ?></td>
    </tr>
  </tfoot>

  <tbody>
<?php foreach ($weeks as $week): ?>
    <tr>
<?php foreach ($week as $day):

list ($number, $current, $data) = $day;

if (is_array($data))
{
	$classes = $data['classes'];
	$output = empty($data['output']) ? '' : '<ul class="output"><li>'.implode('</li><li>', $data['output']).'</li></ul>';
}
else
{
	$classes = array();
	$output = '';
}

?>
      <td class="<?php echo implode(' ', $classes) ?>"><span class="day"><?php echo $day[0] ?></span><?php echo $output ?></td>
<?php endforeach ?>

    </tr>
<?php endforeach ?>

  </tbody>
</table>