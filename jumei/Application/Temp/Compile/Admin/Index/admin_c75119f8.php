<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统管理</title>
	<link rel="stylesheet" href="http://127.0.0.1/Project/jumei/Static/Css/public.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/jumei/Static/Css/aside.css">
</head>
<body>
	<ul>
		<li>
			<h4>个人设置</h4>
			<a href="<?php echo U('Admin/Product/index');?>" target="content">修改密码</a>
			<a href="<?php echo U('Admin/Product/import');?>" target="content">修改个人信息</a>
		</li>
		<li>
			<h4>系统用户</h4>
			<a href="<?php echo U('Admin/Department/index');?>" target="content">部门管理</a>
			<a href="<?php echo U('Admin/Role/index');?>" target="content">角色管理</a>
			<a href="<?php echo U('Admin/Admin/index');?>" target="content">管理员管理</a>
		</li>
		<li>
			<h4>系统配置</h4>
			<a href="<?php echo U('Admin/Brand/index');?>" target="content">常规设置</a>
		</li>
	</ul>
</body>
</html>