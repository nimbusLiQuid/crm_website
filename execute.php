<html>
<head>
<title>CRM+ 数据导入立即执行</title>
<link type="text/css" href="style.css" rel="stylesheet" />
<link type="text/css" href="static/gh-buttons.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no" />
<meta charset="utf-8">
</head>
<body>
    <a href="/" class="button icon arrowleft">返回首页</a>
    <?php
        function p_msg($msg) {
            echo "<p>".$msg."</p>";
        }
        p_msg('开始导入数据...');
        chdir('/home/crm');
        // 调用Python脚本导入数据: 同步执行，显示命令行打印的结果。
        echo '<pre>'.shell_exec('/home/linuxbrew/.linuxbrew/bin/python download_excel.py | tee -a /home/linquan/log/upload_data.log').'<pre>';
        // 建立文件标记，当有此标记时，爬虫就会工作。爬虫完成后会移除此标记。
        shell_exec('touch /home/linquan/workspace/crm_spider/DIRTY.mark');
        p_msg('导入完毕');
    ?>
</body>
</html>
