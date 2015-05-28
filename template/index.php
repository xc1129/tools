<?php
require_once 'template.class.php';

$baseDir=str_replace('\\','/',dirname(__FILE__));
$temp = new template($baseDir.'/source/',$baseDir.'/compiled/');

$temp->assign('pagetitle','smarty made in china');
$temp->assign('test','spirit_xc');

$temp->getSourceTemplate('index');
$temp->compileTemplate();
$temp->display();
