<?php
/**
 * js 排序
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sort</title>
<script src="../js/jquery_172.js" type="text/javascript"></script>
<link rel="stylesheet" rev="stylesheet" href="../css/style.css"  type="text/css" />
<script type="text/javascript">
var data = [
	{'name':'Tom','age':23,'date':'2014-09-01 12:45:32','remark':'Tom的备注'},
	{'name':'John','age':35,'date':'2014-08-20 02:11:12','remark':'John的备注'},
	{'name':'Lily','age':19,'date':'2014-09-24 13:22:52','remark':'Lily的备注'},
	{'name':'Mark','age':42,'date':'2013-11-08 08:30:11','remark':'Mark的备注'}
];
var tr = '<tr>'+
	'<td>$name</td>'+
	'<td>$age</td>'+
	'<td>$date</td>'+
	'<td>$remark</td>'+
	'<td></td>'+
	'</tr>';

// 排序中使用的回调函数，从小到大
var compare = function (prop){
	return function (obj1, obj2){
		var val1 = obj1[prop];
		var val2 = obj2[prop];
		if (val2 > val1){
			return -1;
		}else if(val1 > val2){
			return 1;
		}else{
			return 0;
		}
	}
}
// 字符串 值排序
function onSort1(){
	data.sort(compare('name'));	// 从小到大

	var html = '';
	for(var i=0;data.length>i;i++){
		var row = tr;
		row = row.replace('$name',data[i].name);
		row = row.replace('$age',data[i].age);
		row = row.replace('$date',data[i].date);
		row = row.replace('$remark',data[i].remark);
		html += row;
	}
	$('#tbody').html(html);
}

/**
 * 用于排序
 * 当每个item中的值来自不同数组的时候，推荐使用此种方法，在new item时，可以 push 来自不同数组的数据
 * 否则，可以直接使用 data.sort(function(a,b){return b.age-a.age});
 * @param name
 * @param age
 * @param date
 * @param remark
 */
function item(name,age,date,remark){
	this.name = name;
	this.age = age;
	this.date = date;
	this.remark = remark;
}
// 数字 值排序
function onSort2(){
	var list = new Array();	// 用于排序
	for(var key in data){
		list.push(
			new item(
				data[key].name,
				data[key].age,
				data[key].date,
				data[key].remark
			)
		);
	}

	list.sort(function(a,b){return b.age-a.age});	// 从大到小

	var html = '';
	for(var i=0;list.length>i;i++){
		var row = tr;
		row = row.replace('$name',list[i].name);
		row = row.replace('$age',list[i].age);
		row = row.replace('$date',list[i].date);
		row = row.replace('$remark',list[i].remark);
		html += row;
	}
	$('#tbody').html(html);
}
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
				<td colspan="5">
					<input type="button" onclick="onSort1();" value="按name升序"/>
					<input type="button" onclick="onSort2();" value="按age降序"/>
				</td>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
</body>
</html>