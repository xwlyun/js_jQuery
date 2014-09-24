<?php
/**
 * jQuery post请求到新页面
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>post blank</title>
<script src="../js/jquery_172.js" type="text/javascript"></script>
<script type="text/javascript">
var postData = {'name':'my name','pwd':'my pwd'};
function checkBlank(){
	var form = $('<form/>').attr('action','sub.php').attr('method','post');
	form.attr('target','_blank');
	var input = '';
	for(var key in postData){
		input += '<input type="hidden" name="'+key+'" value="'+ postData[key] +'" />';
	}
	form.append(input).appendTo("body").css('display','none').submit();
}
</script>
</head>
<body>
<a href="javascript:void(0);" onclick="checkBlank();">post新页面</a>
</body>
</html>