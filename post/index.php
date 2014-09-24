<?php
/**
 * jQuery post请求
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>post</title>
<script src="../js/jquery_172.js" type="text/javascript"></script>
<script type="text/javascript">
function checkForm(f){
	var name = f.name.value;
	var pwd = f.pwd.value;
	var url = "sub.php?rnd=" + Math.random();
	$.post(url,{name:name,pwd:pwd},function(data)
	{
		data = eval('('+data+')');
		if(data.error==0)
		{
			alert(data.data);
		}
	});
	return false;
}
</script>
</head>
<body>
	<form action="" method="post" onsubmit="return checkForm(this);">
		name：<input type="text" name="name"/>
		pwd：<input type="text" name="pwd"/>
		<input type="submit"/>
	</form>
</body>
</html>