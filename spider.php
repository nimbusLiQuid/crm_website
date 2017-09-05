<html>
<?php
    readfile('static/header.html');
?>

<h2>百度爬虫</h2>
<p>将为您抓取百度上搜索出来的URL</p>
<p>可以带空格，像用百度搜索一样</p>
<p>结果为PC站点,需要转化为移动端域名</p>
<p>可去: /home/linquan/workspace/baidu/history获取历史文本结果</p>
<hr>

<p>获取百度的前若干页:</p>
<input id="page" type="number" value="3">
<p>设置百度的搜索词:</p>
<input id="token" type="text" placeholder="请输入">

<div>
    <button id="b01">开始爬取</button>
    <button class="btn" data-clipboard-target="#unicom">复制URL到剪贴板</button>
</div>

<div id='spin'></div>
<pre id="unicom"></pre>

<script>
// clipboard.js
new Clipboard('.btn');
$(document).ready(function(){
    var opts = {
          lines: 13 // The number of lines to draw
        , length: 28 // The length of each line
        , width: 14 // The line thickness
        , radius: 42 // The radius of the inner circle
        , scale: 1 // Scales overall size of the spinner
        , corners: 1 // Corner roundness (0..1)
        , color: '#66CCFF' // #rgb or #rrggbb or array of colors
        , opacity: 0.25 // Opacity of the lines
        , rotate: 0 // The rotation offset
        , direction: 1 // 1: clockwise, -1: counterclockwise
        , speed: 1.4 // Rounds per second
        , trail: 60 // Afterglow percentage
        , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
        , zIndex: 2e9 // The z-index (defaults to 2000000000)
        , className: 'spinner' // The CSS class to assign to the spinner
        , top: '50%' // Top position relative to parent
        , left: '50%' // Left position relative to parent
        , shadow: false // Whether to render a shadow
        , hwaccel: false // Whether to use hardware acceleration
        , position: 'absolute' // Element positioning
    };
    var target = document.getElementById('spin')
    var spinner = new Spinner(opts);
    $("#b01").click(function(){
        $("#b01").attr('disabled', true).text('正在爬取，请耐心等待');
        spinner.spin(target);
        $.ajax({
        method: 'POST',
        data: $.param({
            page: $("#page").val(),
            token: $("#token").val()
        }),
        url:"/ajax_php/run_spider.php",
        async: true,
        success: function(data) {
            spinner.spin();
            $("#unicom").html(data);
            $("#b01").attr('disabled', false).text('开始爬取');
        }
    });
});
});
</script>

</body>
</html>
