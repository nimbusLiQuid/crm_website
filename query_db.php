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

<h2>数据库查询</h2>

<form methods='get'>
    <div id='text'>
        <label class='note'> 输入查询关键词 </label>
        <input v-model.trim="msg" type='text' name='token' placeholder='多个关键词请用英文逗号隔开' value="<?php echo $token ?>" />
    </div>
    <div id='date'>
        <label class='note'> 输入查询日期 </label>
        <input type='date' name='date' placeholder='20170601' value="<?php echo $date ?>"  />
    </div>
    <div id='tag'>
        <label class='note'> 输入查询tag_id</label>
        <input v-model="tag_id" type='number' name='tag_id' placeholder='3' value="<?php echo $tag_id ?>" />
    </div>
    <div>
        <input id="query" type='submit' class='button' name='action' value='查询' />
    </div>
</form>


<?php
if ($token and  $date and $tag_id) {
    echo '<pre>'.shell_exec("export PYTHONIOENCODING=UTF-8; /home/linuxbrew/.linuxbrew/bin/python3 /home/linquan/workspace/crm_spider/data_selector.py $token $date $tag_id  2>&1").'</pre>';
} else {
    echo '<p id="tip"> 请给出完整的参数 </p>';
}
?>

<button id='dev'>按钮</button>


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

$('#dev').click(function(){
    $.ajax({
        type: 'GET',
        url: 'test.json'});
}
);


</script>

</body>
</html>
