<?php

require_once 'regexTool.class.php';

$regex=new regexTool(); 
$regex->setFixMode('U');
$r=$regex->isEmail('asdkjfalsdj@qq.com');
echo $r;
?>
