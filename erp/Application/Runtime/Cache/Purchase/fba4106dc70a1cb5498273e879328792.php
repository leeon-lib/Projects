<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑供应商信息</title>
	<link rel="stylesheet" href="/Project/erp/web/Public/Org/Bootstrap/css/Bootstrap.min.css">
	<link rel="stylesheet" href="/Project/erp/web/Public/Css/public.css">
	<link rel="stylesheet" href="/Project/erp/web/Public/Css/content.css">
</head>
<body>
	<div class="warp">
		<div class="submenu">
			<div class="left">
				<a href="<?php echo U('Purchase/Supplier/index');?>">供应商列表</a>
				<span>|</span>
				<a href="<?php echo U('Purchase/Supplier/add');?>">添加供应商</a>
			</div>
			<div class="right">
				<a href="">后退</a>
				<span>|</span>
				<a href="">刷新</a>
			</div>
		</div>
		<div class="content">
			<form action="<?php echo U('Purchase/Supplier/operate');?>" method="post">
				<table class="content-table">
					<tbody>
						<tr class="title">
							<td colspan="10">添加供应商：</td>
						</tr>
						<tr>
							<td width="10%">供应商名称：</td>
							<td><input type="text" name="name" value="<?php echo ($oldDate["name"]); ?>"></td>
						</tr>
						<tr>
							<td width="10%">经营类别：</td>
							<td>
								<select name="kind_id">
									<option value="-1">请选择</option>
									<option value="1" <?php if(($oldDate['kind_id']) == "1"): ?>selected="selected"<?php endif; ?> >综合</option>
									<option value="2" <?php if(($oldDate['kind_id']) == "2"): ?>selected="selected"<?php endif; ?> >自有品牌</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>品牌：</td>
							<td>
								<select name="brand_id">
									<option value="">品牌</option>
								</select>
							</td>
						</tr>
						<tr>
							<td width="10%">联系人：</td>
							<td><input type="text" name="manager" value="<?php echo ($oldDate["manager"]); ?>"></td>
						</tr>
						<tr>
							<td width="10%">联系人电话：</td>
							<td><input type="text" name="mobile" value="<?php echo ($oldDate["mobile"]); ?>"></td>
						</tr>
						<tr>
							<td width="10%">QQ号：</td>
							<td><input type="text" name="qq" value="<?php echo ($oldDate["qq"]); ?>"></td>
						</tr>
						<tr>
							<td width="10%">邮箱：</td>
							<td><input type="text" name="email" value="<?php echo ($oldDate["email"]); ?>"></td>
						</tr>
						<tr class="btn">
							<input type="hidden" name="id" value="<?php echo ($oldDate["id"]); ?>">
							<td><input type="submit" value="修改"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</body>
</html>