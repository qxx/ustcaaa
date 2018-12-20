<!doctype html>
<html>
<head>
<title>中国科学技术大学天文爱好者协会</title>
<?php include '../publichead.html'; ?>
</head>
<body>


<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<?php include '../header.html'; ?>
		<?php include '../nav.html'; ?>	
			<div class="jumbotron">
<!-- article -->			
<?php
	$_SESSION = array(); //清除SESSION值.
    if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
		setcookie(session_name(),'',time()-1,'/');
    }
    session_destroy();  //清除服务器的sesion文件
	header("Location: /astro/user/");
?>
<!-- /article -->	
			</div>
		</div>
	</div>
	<?php include '../footer.html'; ?>
</div>
</body>
</html>