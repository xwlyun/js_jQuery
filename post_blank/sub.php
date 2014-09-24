<?php

$name = isset($_POST['name'])?$_POST['name']:'';
$pwd = isset($_POST['pwd'])?$_POST['pwd']:'';

echo "hello,{$name},{$pwd}";

die();