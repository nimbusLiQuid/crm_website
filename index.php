<html>
<?php
readfile('static/header.html');
require_once('yun.php'); 
?>

<p id='t1'>you can not see me</p>
</body>


<div id="footer">
  <p id="pop"  v-on:click="popMessage" contenteditable="false"> {{ message }} </p>
    <?php
    require_once('pv.php')
    ?>
</div>

<script type="text/javascript">

// $("#data_divide").hide();
$("#t1").hide();
// 处理 Vue.js 框架
var app2 = new Vue({
    el: "#pop",
    data: {
        message: "Version 0.0.4  2013-2017 BCData Co,ltd.",  
    },
    methods: {
        popMessage: function() {
            alert(this.message + '\nA Vue.js and PHP work by Lin Quan')
        }
    }
})
</script>
</html>
