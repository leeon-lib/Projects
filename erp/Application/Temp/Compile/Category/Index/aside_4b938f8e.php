<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品</title>
	<link rel="stylesheet" href="./public.css">
	<link rel="stylesheet" href="./aside.css">
</head>
<body>
	<ul>
		<li>
			<h4>商品管理</h4>
			<a href="" target="content">列表</a>
			<a href="" target="content">添加</a>
		</li>
		<li>
			<h4>品牌管理</h4>
			<a href="" target="content">列表</a>
			<a href="" target="content">添加</a>
		</li>
		<li>
			<h4>类别管理</h4>
			<a href="<?php echo U('Category/Category/index');?>" target="content">分类管理</a>
			<a href="<?php echo U('Category/Attribute/index');?>" target="content">属性管理</a>
		</li>
	</ul>
</body>
</html>