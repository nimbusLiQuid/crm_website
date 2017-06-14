<html>
  <head>
    <title>CRM+</title>
    <link type="text/css" href="style.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />   
    <meta name="apple-mobile-web-app-capable" content="yes" />  
    <meta name="format-detection" content="telephone=no" />  
    <meta charset="utf-8">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.js"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
  </head>
<body>

<div class="header" role="banner">
    <h1>CRM+运营站点</h1>
</div>

<hr />
<li id="dbm"> {{description}} </li> 
<a href='phpMyAdmin-4.7.0-all-languages/index.php'> Database Manager </a>



<hr />
<li>点击按钮选取要上传数据文件</li>


<form action="upload_file.php" method="post"
    enctype="multipart/form-data">
    <input type="file" name="file" id="file" /> 
    <hr />

    <!--
    <label for="tag_id">若未重命名文件, 请指定tag_id:</label>
    <input type="text" name="tag_id" id="tag_id" />
    <hr />
    -->


    <input type="submit" name="submit" value="上传此文件" />
</form>

<hr />

<?php
    $order_file_dir = "./upload/";
    echo "<p>服务器每隔10分钟处理一次</p>";
    echo "<p>已上传等待处理的文件是(.和..请忽略):</p>";
    $file = scandir($order_file_dir);
    foreach ($file as $k=>$v) {
        echo "<li>".$v."</li>";
    }

    //首先设置时区为东八区，也就是我国的标准时间所在区。Asia/Hong_Kong、Asia/Shanghai（上海）或Asia/Urumqi（乌鲁木齐）等，都是东八区的时间。设置为其中的一种都可以
    date_default_timezone_set('Asia/Shanghai');
    // 获取当前服务器时间
    // $time= date('Y-m-d H:i:s',time());
    echo "<p>当前服务器时间:</p>";
    $time= date(time()*1000);

?>
<div id="CurrentTime"></div>
<script type="text/javascript">
        var arr=parseInt("<?php echo $time;?>")
        function changetime(){
            var ary = Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
            var Timehtml = document.getElementById('CurrentTime');
            var date = new Date(arr);
            Timehtml.innerHTML = '<li>'+date.toLocaleString()+'   '+ary[date.getDay()] + '</li>';
            arr += 1000;
        }
        window.onload = function(){
            changetime();
            setInterval(changetime,1000);
            // alert('请点击按钮上传文件');
        }
</script>


<p>导入数据: 每整10分钟，3-22点 </p>
<p>爬虫获取页面数据：2,12,22,32,42,52分钟， 5-19点 </p>

<footer id="bcdata" v-on:click="popMessage">
  <p contenteditable="false"> {{ message }} </p>
</footer>



<script type="text/javascript">
// 处理 Vue.js 框架
var app = new Vue({
    el: "#dbm",
    data: {
        description: "数据库管理"
    }
})

var app2 = new Vue({
    el: "#bcdata",
    data: {
        message: "2014-2017 BCData Co,ltd.",  
    },
    methods: {
        popMessage: function() {
            alert(this.message + '\nA Vue.js and PHP work by Lin Quan')
        }
    }
})
</script>

</body>
</html>
