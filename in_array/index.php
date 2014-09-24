<?php
/**
 * jQuery js 判断数组中的键值
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>in array</title>
<script src="../js/jquery_172.js" type="text/javascript"></script>
<script type="text/javascript">
var data1 = {'name':'my name','pwd':'my pwd'};
var data2 = ['a','b','c','d','e'];
function checkData1(){
	var html = '';
	if(data1['name']){
		html += 'name:'+data1['name']+'<br/>';
	}else{
		html += 'name:error'+'<br/>';
	}
	if(data1['age']){
		html += 'age:'+data1['age']+'<br/>';
	}else{
		html += 'age:error'+'<br/>';
	}
	$('#tip1').html(html);
}
function checkData2(){
	var html = '';
	if($.inArray('e',data2)>-1){
		html += 'e:yes'+'<br/>';
	}else{
		html += 'e:no'+'<br/>';
	}
	if($.inArray('f',data2)>-1){
		html += 'f:yes'+'<br/>';
	}else{
		html += 'f:no'+'<br/>';
	}
	$('#tip2').html(html);
}
$(document).ready(function(){
	checkData1();
	checkData2();
});
</script>
</head>
<body>
<div id="tip1"></div>
<div id="tip2"></div>
</body>
</html>