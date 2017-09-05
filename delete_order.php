<html>
<?php
    readfile('static/header.html');
?>

<h1>删除订单</h1>
<p>已删除</p>
<hr>


<!-- 警告： 此网页危险，请勿乱来  ->
<?php
echo '<pre>' . shell_exec('sudo rm -vf /home/crm/orders/*; 2>&1')  .'</pre>';
echo '<pre>' . shell_exec('sudo rm -vf /home/crm/yun_orders/*; 2>&1')  .'</pre>';
?>

</body>
</html>
