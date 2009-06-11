<ul>
  <li>Modules</li>
</ul>

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