<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品管理</title>
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/public.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/aside.css">
</head>
<body>
	<ul>
		<li>
			<h4>商品管理</h4>
			<a href="<?php echo U('Product/Product/index');?>" target="content">商品管理</a>
			<a href="<?php echo U('Product/Product/import');?>" target="content">导入商品</a>
			<a href="<?php echo U('Product/Product/picSize');?>" target="content">图片尺寸</a>
		</li>
		<li>
			<h4>分类属性</h4>
			<a href="<?php echo U('Product/Category/index');?>" target="content">分类管理</a>
			<a href="<?php echo U('Product/Attribute/index');?>" target="content">属性管理</a>
		</li>
		<li>
			<h4>品牌供应</h4>
			<a href="<?php echo U('Product/Brand/index');?>" target="content">品牌管理</a>
			<a href="<?php echo U('Product/Supplier/index');?>" target="content">供应商管理</a>
		</li>
	</ul>
</body>
</html>