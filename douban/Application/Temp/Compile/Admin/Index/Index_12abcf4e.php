<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/public.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/admin.css">
</head>
<body>
	<div class="head">
		<div class="logo">
			<a href="">Logo
				<!-- <img src="../Admin/photo.jpg" alt=""> -->
			</a>
		</div>
		<div class="nav">
			<ul>
				<li>
					<a href="">个人中心</a>
				</li>
				<li>
					<a href="<?php echo U('Admin/Aside/product');?>" target="aside">商品管理</a>
				</li>
				<li>
					<a href="<?php echo U('Admin/Aside/purchase');?>" target="aside">采购管理</a>
				</li>
				<li>
					<a href="<?php echo U('Admin/Aside/stock');?>" target="aside">库存管理</a>
				</li>
				<li>
					<a href="<?php echo U('Admin/Aside/order');?>" target="aside">订单管理</a>
				</li>
				<li>
					<a href="<?php echo U('Admin/Aside/mall');?>" target="aside">商城管理</a>
				</li>
				<li>
					<a href="<?php echo U('Admin/Aside/admin');?>" target="aside">系统设置</a>
				</li>
			</ul>
		</div>
		<div class="info">
			<div class="user">
				<p>部门：<span>研发部</span> 角色：<span>后端开发</span></p>
				<p><span>User</span> Welcome!</p>
			</div>
			<div class="exit">
				<a href="">退出</a>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="aside">
			<iframe src="" scrolling="auto" frameborder="0" style="height:100%;width:100%;" name="aside"></iframe>
		</div>
		<div class="content">
			<div class="crumbs">
				<a href="">后退</a>
				<a href="">刷新</a>
			</div>
			<iframe src="" scrolling="auto" frameborder="0" style="height:100%;width:100%;" name="content"></iframe>
		</div>
	</div>
</body>
</html>