<?php

require_once 'regexTool.class.php';

$regex=new regexTool(); 
$regex->setFixMode('U');
$r=$regex->isEmail('asdkjfalsdj@qq.com');
echo $r;
echo "\n";
$regex1=new regexTool();
$pattern='/^(\w+)\.(\w+)\.com$/';
$subject='www.test.com';
$r2=$regex1->regex($pattern,$subject);
echo $r2;
?>
