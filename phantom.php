<html>
<?php
    readfile('static/header.html');
?>

<h2>转移动端URL</h2>
<p>将为您转换成移动端URL</p>
<hr>

<p>需要转换的URL:</p>
<textarea id="url" rows="20" cols="30"> </textarea>

<div>
    <button id="b01">开始转换</button>
    <button id="b02">强制停止</button>
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
        $("#b01").attr('disabled', true).text('正在转换，请耐心等待');
        spinner.spin(target);
        $.ajax({
        method: 'POST',
        data: $.param({
            pc_url: $("#url").val()
        }),
        url:"/ajax_php/run_phantom.php",
        async: true,
        success: function(data) {
            spinner.spin();
            $("#unicom").html(data);
            $("#b01").attr('disabled', false).text('开始转换');
        }
    });
});
    $("#b02").click(function(){
        $("#b02").attr('disabled', true).text('正在停止');
        spinner.spin(target);
        $.ajax({
        method: 'POST',
        data: $.param({
            pc_url: $("#url").val()
        }),
        url:"/ajax_php/stop_phantom.php",
        async: true,
        success: function(data) {
            spinner.spin();
            $("#b02").attr('disabled', false).text('强制停止');
        }
    });
});

});
</script>

</body>
</html>
