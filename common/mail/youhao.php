<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/12
 * Time: 15:07
 */

 ?>

<table border="1" cellpadding="0" cellspacing="0">
<?php foreach ($list as $key => $item): ?>
 <tr><td><?= $key ?></td><td><?= $item ?></td></tr>
<?php endforeach;?>

</table>