<html>
<?php
    readfile('static/header.html');
?>

<h1>使用须知</h1>
<p>请将转换前的订单放置到FTP的orders目录下, 然后使用点击进入本页面(或者刷新本页面)获取结果。</p>
<p>您只需要复制正文中的内容到邮件即可。</p>
<p>如订单制作有错，本页面也会给出错误提醒。<p>
<p>附件请去FTP的yun_orders这个目录提取。<p>
<hr>

<?php
chdir('/home/crm');
echo '<pre>' . shell_exec('sudo /home/linuxbrew/.linuxbrew/bin/python publish.py 2>&1')  .'</pre>';
echo '<hr>';
echo '<pre id="telecom">' . shell_exec('sudo /home/linuxbrew/.linuxbrew/bin/python show_order_code.py 2>&1')  .'</pre>';
?>

<script>
// clipboard.js
new Clipboard('.btn');

$(document).ready(function() {
    var myDate = new Date();
    var month = myDate.getMonth() + 1;   // js month starts at 0
    var day = myDate.getDate();
    var mail_date = month + '.' + day;
    var mail_link = "mailto:liyang@chinatelecom.cn?subject=百川订单更新" + mail_date + "&cc=郭立杰 <guolijie@baicdata.com>, 何帅 <heshuai@baicdata.com>, 林泉 <linquan@baicdata.com>, 周露 <zhoulu@baicdata.com>";
    // 注册ajax按钮点击事件
    $("#b01").click(function() {
        $.ajax({
            method: 'POST',
            url:"/ajax_php/unicom_url.php",
            async: true,
            success: function(data) {
                // alert('获取成功,请点击复制URL到剪贴板');
                $("#unicom").html(data);
                $("#b01").attr('disabled', true).text('已获取');
                var t = $(window).scrollTop();
                $('body,html').animate({'scrollTop': t + 500}, 1000)
            }
        });
    });
    // 其他DOM元素初始化
    $("#mailbtn").attr("href", mail_link);
});
</script>

<button class="btn" data-clipboard-target="#telecom">复制订单详情到剪贴板</button>
<a id="mailbtn" href="">给李洋发邮件</a>
<div>
    <button id="b01">获取联通URL</button>
    <button class="btn" data-clipboard-target="#unicom">复制URL到剪贴板</button>
</div>
<pre id="unicom"></pre>

<p>本页面 完</p>
</body>
</html>
