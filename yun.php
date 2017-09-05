<h2>导入云公司数据</h2>
<p>上传Excel文件并执行</p>
<hr>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
    <input  type="file" name="file" id="file" />
    <hr />
    <div class="button-group">
        <input class="button" type="submit" name="submit" value="上传" />
        <input class="button" type="submit" name="delete" value="删除" />
    </div>
</form>

<?php
require __DIR__ . '/vendor/autoload.php';
//require __DIR__ . '/auth.php';
$order_file_dir = "./upload/";
$file = scandir($order_file_dir);
// 2+0: 排除掉.和..这两个特殊文件
if (count($file) > 2 + 0) {
    echo "<p>已上传等待处理的文件有:</p>";
    echo "<hr>";
}
foreach ($file as $k=>$v) {
    if (($v != ".") && ($v != "..")) {
        echo "<li><img src='static/excel.png' height='25' width='25'> </img> ".$v."  </li>";
    }
}
echo "<hr>";
echo "<p> 最近处理的30个文件: </p>";
echo "<pre>".shell_exec('ls -gGh /home/crm/history/ | cut -b 15-128| tail -30')."</pre>";
?>

<hr>
<p>所有文件上传完毕后，点击按钮执行数据导入</p>
<form action="execute.php" method="post"
    enctype="multipart/form-data">
    <input class="button icon add" type="submit" name="execute" id="execute" value="立即执行" />
</form>
