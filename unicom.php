<html>
<?php
readfile('static/header.html');
$token = $_GET['token'];
$date = $_GET['date'];
$tag_id = $_GET['tag_id'];
if ($tag_id) {
    // do nothing
} else {
    $tag_id = 3;
}
?>

<h2>导入联通数据</h2>
<p>您可以先点击导入数据来获取订单列表,然后填入activityId和tag_id再次点击导入数据来导入系统</p>
<p>请先登录<a href="http://111.198.162.44/jzyxpt/">联通精准营销外呼平台</a>然后依次点击: "企业营销管理 - 企业项目管理 - 推送 - FTP"</p>
<pre>
    百川通联（北京）网络技术有限公司    用户名        密码
   💡用这个登录→ 百川管理员：             bctll        bctll2017
    百川班长：                        BCTLL_bz    BCTLL_bz
    百川坐席：                        BCTLL_zx    BCTLL_zx
    百川质检：                        BCTLL_zj    BCTLL_zj

    企业标识：BCTLL
    企业ID与技能组：LTBD2017062701,100141
    企业外显号码：055165259219
</pre>

<div id='text'>
    <label class='note'> 输入activityId </label>
    <input id="activityId" type='text' name='token'/>
</div>

<div id='tag'>
    <label class='note'> 输入系统tag_id</label>
    <input id="tag_id" type='number' name='tag_id' placeholder='' />
</div>
<div>
    <button id="load">导入数据</button>
</div>


<script>
$(document).ready(function() {
    // 注册ajax按钮点击事件
    $("#load").click(function() {
        $("#load").attr('disabled', true).text('正在获取...');
        $.ajax({
            method: 'POST',
            data: $.param({activityId: $("#activityId").val(), tag_id: $("#tag_id").val()}),
            url:"/ajax_php/run_unicom.php",
            async: true,
            success: function(data) {
                $("#load").attr('disabled', false).text('导入数据');
                $("#unicom").html(data);
                var t = $(window).scrollTop();
                $('body,html').animate({'scrollTop': t + 500}, 1000)
            }
        });
    });
});
</script>

<pre id="unicom"></pre>

<div id="footer">
    <?php
    require_once('pv.php')
    ?>
</div>


</body>
</html>
