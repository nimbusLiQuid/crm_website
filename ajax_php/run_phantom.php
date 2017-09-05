<?php
set_time_limit(1800);
$url= $_POST['pc_url'];
// $url = str_replace("\n", ',', $url);
$url_list = explode("\n", $url);
// echo base64_encode($url);
chdir('/home/linquan/workspace/phantom/');
// die();
foreach ($url_list as $url) {
    echo shell_exec('/home/linquan/software/phantomjs-2.1.1-linux-x86_64/bin/phantomjs  trans_url.js  ' . $url . ' 2>&1');
}
?>
