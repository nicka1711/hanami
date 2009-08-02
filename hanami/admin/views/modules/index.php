<ul>
  <li>Modules</li>
</ul>
<?php echo Kohana::debug($modules)?>
<ul>
<?php foreach($modules as $module): ?>
  <li>
<?php foreach($module['methods'] as $method): ?>
  <h3><?php echo $method['name']?></h3>
  <p><?php echo $method['desc'];?></p>
<?php endforeach; ?>
  </li>
<?php endforeach; ?>
</ul>