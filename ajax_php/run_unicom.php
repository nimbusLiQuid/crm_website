<?php
// 导入联通数据ajax后台
set_time_limit(1800);
$activityId = $_POST['activityId'];
$tag_id = $_POST['tag_id'];
chdir('/home/linquan/workspace/unicom_api/');
echo shell_exec('/home/linuxbrew/.linuxbrew/bin/python unicom_api.py '.$activityId.' '.$tag_id." | tee history/$activityId.txt  2>&1");
// 创建标记让爬虫系统启动
shell_exec('touch /home/linquan/workspace/crm_spider/DIRTY.mark');
?>
