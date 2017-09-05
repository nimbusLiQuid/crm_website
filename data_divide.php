<html>
<?php
readfile('static/header.html');
?>
<h2>数据标签细分</h2>

<?php
echo '<pre>'.shell_exec("source /home/linquan/.bash_profile; cd /home/linquan/workspace/chudian/log_system; sh get.sh; cd /home/linquan/workspace/crm_spider; sh divide.sh").'</pre>';
?>


<div id="footer">
  <p id="pop"  v-on:click="popMessage" contenteditable="false"> {{ message }} </p>
    <?php
    require_once('pv.php')
    ?>
</div>

<script type="text/javascript">
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

</body>
</html>
