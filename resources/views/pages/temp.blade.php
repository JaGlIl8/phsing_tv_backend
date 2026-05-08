<?php
$specifiedTime = mktime(12, 55, 0, 12, 25, 2009);

echo "指定時間刻印：" . $specifiedTime . "<br>";
echo date("Y年m月d日H時i分s秒", $specifiedTime) . "<br>";
echo "這一年第" . date("z", $specifiedTime) . "天<br>";

echo "<br>";

$currentTime = time();
echo "現在時間刻印：" . $currentTime . "<br>";
echo "現在時間：" . date("Y/n/j g:i:s A", $currentTime);
?>