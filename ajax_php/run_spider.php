<?php
set_time_limit(1800);
$token = $_POST['token'];
$page = $_POST['page'];
chdir('/home/linquan/workspace/baidu/');
echo shell_exec('/home/linuxbrew/.linuxbrew/bin/python php_interface.py '.$page.' '.$token." | tee history/$token.txt  2>&1");
?>
