<html>
  <head>
    <title>CRM+ 数据导入结果</title>
    <link type="text/css" href="style.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <meta charset="utf-8">
  </head>
<body>

<?php

function p_msg($msg) {
    echo "<p>".$msg."</p>";
}

//p_msg("你指定的tag_id是: ".$_POST["tag_id"]);
//$tag_id = $_POST["tag_id"];

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
      p_msg("文件上传成功, 请等待程序自动处理.");
      }
    }
} else {
    p_msg("未选择有效文件!");
}
?>
    <input type="button" name="button" id="button" value="返回首页" onClick="location.href='/'" />

</body>
</html>
