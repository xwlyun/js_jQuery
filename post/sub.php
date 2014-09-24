<?php

$name = isset($_POST['name'])?$_POST['name']:'';
$pwd = isset($_POST['pwd'])?$_POST['pwd']:'';

$return = array(
	'error'		=>	0,
	'errmsg'	=>	'success',
	'data'		=>	1
);

$data = "hello,{$name},{$pwd}";
$return['data'] = $data;

echo json_encode($return);
die();