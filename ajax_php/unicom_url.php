<?php
chdir('/home/crm');
echo shell_exec('sudo /home/linuxbrew/.linuxbrew/bin/python order_urls.py 2>&1');
?>
