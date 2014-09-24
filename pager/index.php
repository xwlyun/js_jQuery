<?php
/**
 * js 分页
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pager</title>
<script src="../js/jquery_172.js" type="text/javascript"></script>
<link rel="stylesheet" rev="stylesheet" href="../css/style.css"  type="text/css" />
<script type="text/javascript">
var data = [
	{'name':'Tom','age':23,'date':'2014-09-01 12:45:32','remark':'Tom的备注'},
	{'name':'John','age':35,'date':'2014-08-20 02:11:12','remark':'John的备注'},
	{'name':'Lily','age':19,'date':'2014-09-24 13:22:52','remark':'Lily的备注'},
	{'name':'Mark','age':42,'date':'2013-11-08 08:30:11','remark':'Mark的备注'},
	{'name':'Cat','age':21,'date':'2012-11-08 09:31:12','remark':'Cat的备注'},
	{'name':'Dog','age':22,'date':'2012-11-09 10:32:13','remark':'Dog的备注'}
];
var total = data.length;
var limit = 3;
var tr = '<tr>'+
	'<td>$name</td>'+
	'<td>$age</td>'+
	'<td>$date</td>'+
	'<td>$remark</td>'+
	'<td></td>'+
	'</tr>';

function onPage(p){
	var start = (p-1)*limit;
	var end = p*limit;
	var html = '';
	for(var i=start;end>i;i++){
		var row = tr;
		row = row.replace('$name',data[i].name);
		row = row.replace('$age',data[i].age);
		row = row.replace('$date',data[i].date);
		row = row.replace('$remark',data[i].remark);
		html += row;
	}
	$('#tbody').html(html);
	getPage(total,p,limit);
}

/**
 * 显示分页控件
 * @param t 数据总数
 * @param p 当前页码
 * @param l 每页显示数
 */
function getPage(t,p,l){
	var html = '';
	var t_page = Math.ceil(t/l);
	var s_page = p-2;
	var e_page = p+2;
	if(1>s_page)
	{
		s_page = 1;
	}
	if(e_page>t_page)
	{
		e_page = t_page;
	}
	html += '<div class="page"><span>共有'+t+'条记录</span><a href="javascript:void(0);" onclick="onPage(1);" target="_self">首页</a>';

	for(var i=s_page;e_page>=i;i++)
	{
		if(p==i)
		{
			html += '<span class="cur">'+i+'</span>';
		}
		else
		{
			html += '<a href="javascript:void(0);" onclick="onPage('+i+');" target="_self">'+i+'</a>';
		}
	}
	var n_page=p+1;
	html += '<a href="javascript:void(0);" onclick="onPage('+t_page+');" target="_self">末页</a>';
	if(t_page>=n_page){
		html += '<a href="javascript:void(0);" onclick="onPage('+n_page+');" target="_self">下一页</a>';
	}
	html += '<span>共'+t_page+'页</span>';
	html += '</div>';
	$('#tfoot').html(html);
}

$(document).ready(function(){
	onPage(1);
});
</script>
</head>
<body>
<div class="main">
	<div class="mcontent">
		<table class="tablist" width="100%" border="0" cellspacing="0" cellpadding="0">
			<thead>
			<tr>
				<td>name</td>
				<td>age</td>
				<td>date</td>
				<td>remark</td>
				<td></td>
			</tr>
			</thead>
			<tbody id="tbody">

			</tbody>
			<tfoot>
			<tr>
				<td colspan="5" id="tfoot">
				</td>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
</body>
</html>