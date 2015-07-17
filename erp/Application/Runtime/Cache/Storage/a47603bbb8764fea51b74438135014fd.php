<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加库房</title>
	<link rel="stylesheet" href="/Project/erp/web/Public/Org/Bootstrap/css/Bootstrap.min.css">
	<link rel="stylesheet" href="/Project/erp/web/Public/Css/public.css">
	<link rel="stylesheet" href="/Project/erp/web/Public/Css/content.css">
</head>
<body>
	<div class="warp">
		<div class="submenu">
			<div class="left">
				<a href="<?php echo U('Storage/Warehouse/index');?>">库房列表</a>
				<span>|</span>
				<a href="<?php echo U('Storage/Warehouse/add');?>">添加库房</a>
			</div>
			<div class="right">
				<a href="">后退</a>
				<span>|</span>
				<a href="">刷新</a>
			</div>
		</div>
		<div class="content">
			<form action="<?php echo U('Storage/Warehouse/operate');?>" method="post">
				<table class="content-table">
					<tbody>
						<tr class="title">
							<td colspan="10">直接录入：</td>
						</tr>
						<tr>
							<td width="10%">所属地区：</td>
							<td>
								<select name="city_id">
									<option value="-1">请选择</option>
									<?php if(is_array($cityList)): foreach($cityList as $key=>$v): ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td width="10%">库房名称：</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td width="10%">详细地址：</td>
							<td><input type="text" name="address"></td>
						</tr>
						<tr>
							<td>联系人：</td>
							<td><input type="text" name="manager"></td>
						</tr>
						<tr>
							<td>联系电话：</td>
							<td><input type="text" name="mobile"></td>
						</tr>
						<tr class="btn">
							<td><input type="submit" value="添加"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</body>
</html>