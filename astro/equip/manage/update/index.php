<!doctype html>
<html>
<head>
<title>中国科学技术大学天文爱好者协会--装备部</title>
<?php include '../../../publichead.html'; ?>
<?php 
	session_start();
	if(!($_SESSION['stunb'])){
		header("Location: /astro/user/login.php?nextdo=%2Fastro%2Fequip%2Fmanage%2Fupdate");
		exit();
	}
	if('1'!=($_SESSION['equip'])){
		header("Location: /astro/user/noauth.php");
		exit();
	}
?>
</head>
<body>


<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<?php include '../../../header.html'; ?>
		<?php include '../../nav.html'; ?>	
			<div class="jumbotron">
<!-- article -->
<div class="row clearfix">
<center><h3>注意，只能用来更改除ID以外的设备记录，此表单中的ID仅用于确定设备</h3></center>
	<div class="col-md-8 col-md-offset-3 column">
		<form action="./update.php" method="POST" class="form-horizontal" role="form">
			<div class="form-group"><label for="id" class="col-sm-2 control-label">设备ID</label><div class="col-sm-10"><input type="number" class="form-control" name="id" id="id" min="1" step="1" required="required" <?php if(is_numeric($_GET['id']))echo "value=\"".$_GET['id']."\" readonly=\"readonly\"";?>/></div></div>
			<div class="form-group"><label for="type" class="col-sm-2 control-label">设备类型</label><div class="col-sm-10"><input type="text" class="form-control" name="type" id="type" list="type_list" value="<?php if($_GET['type'])echo $_GET['type'];?>"/></div></div>
			<div class="form-group"><label for="value1" class="col-sm-2 control-label">特征值1</label><div class="col-sm-10"><input type="text" class="form-control" name="value1" id="value1" value="<?php if($_GET['value1'])echo $_GET['value1'];?>"/></div></div>
			<div class="form-group"><label for="value2" class="col-sm-2 control-label">特征值2</label><div class="col-sm-10"><input type="text" class="form-control" name="value2" id="value2" value="<?php if($_GET['value2'])echo $_GET['value2'];?>"/></div></div>
			<div class="form-group"><label for="state" class="col-sm-2 control-label">设备状态</label><div class="col-sm-10"><input type="text" class="form-control" name="state" id="state" list="state_list" value="<?php if($_GET['state'])echo $_GET['state'];?>"/></div></div>
			<div class="form-group"><label for="remarks" class="col-sm-2 control-label">备注</label><div class="col-sm-10"><input type="text" class="form-control" name="remarks" id="remarks" value="<?php if($_GET['remarks'])echo $_GET['remarks'];?>"/></div></div>
			<div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-success">更新设备数据</button></div>
		</form>
	</div>
</div>
	<div class="table-responsive"><table  class="table table-hover table-striped" style="text-align:center;"><thead><tr><th style="text-align:center;">ID</th><th style="text-align:center;">设备类型</th><th style="text-align:center;">特征值1</th><th style="text-align:center;">特征值2</th><th style="text-align:center;">设备状态</th><th style="text-align:center;">备注</th></tr></thead>
		<tbody>
<?php	
	require "../../mysqlconnection.php";
	if (mysqli_connect_errno()){
		echo "<p>连接数据库失败：",mysqli_connect_error(),"</p>\n";
	}else{
	
	//显示所有设备
	$result=$connection->query("SELECT * FROM equipment ORDER BY id DESC;");
	while($row=$result->fetch_object()){
		echo "<tr><td><a href=\"/astro/equip/detail/index.php?id=",$row->id,"\" >",$row->id,"</a></td><td>",$row->type,"</td><td>",$row->value1,"</td><td>",$row->value2,"</td><td>",$row->state,"</td><td>",$row->remarks,"</td></tr>\n";
	}
	$result->close();
	}
	
?>
		</tbody>
	</table>
	</div>
<?php include '../../type_list.html'; ?>
<?php include '../../state_list.html'; ?>
<!-- /article -->
			</div>
		</div>
	</div>
	<?php include '../../../footer.html'; ?>
</div>
</body>
</html>
