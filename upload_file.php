<html>

<?php
readfile('static/header.html');
?>

<div>

</div>

<?php
function p_msg($msg) {
    echo "<p>".$msg."</p>";
}

//p_msg("你指定的tag_id是: ".$_POST["tag_id"]);
//$tag_id = $_POST["tag_id"];

// 如果post指令是delete，则删除所有上传的文件
if (array_key_exists('delete', $_POST)) {
    shell_exec('rm upload/*');
    p_msg('已执行文件删除');
    exit();
}

$file_extension = end(explode(".", $_FILES["file"]["name"]));
$allowedExts = array("xls", "xlsx");

if  ($_FILES["file"]["size"] > 200 * 1024 * 1024) {
    echo "File too large:";
    echo $_FILES["file"]["size"];
    return;
} 

if (in_array($file_extension, $allowedExts))  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      chmod("upload/" . $_FILES["file"]["name"], 0777);
      p_msg("文件上传成功");
      }
    }
} else {
    p_msg("未选择有效文件!");
    // p_msg(implode(',', $_POST));
    // print_r($_POST);

}
?>

</body>
</html>
