<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑管理员信息</title>
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Org/Bootstrap/css/Bootstrap.min.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/public.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/content.css">
</head>
<body>
	<div class="warp">
		<div class="submenu">
			<div class="left">
				<a href="<?php echo U('Admin/Admin/index');?>">管理员列表</a>
				<span>|</span>
				<a href="<?php echo U('Admin/Admin/add');?>">添加管理员</a>
			</div>
			<div class="right">
				<a href="">后退</a>
				<span>|</span>
				<a href="">刷新</a>
			</div>
		</div>
		<div class="content">
			<form action="<?php echo U('Admin/Admin/operate');?>" method="post">
				<table class="content-table">
					<tbody>
						<tr class="title">
							<td colspan="10">编辑管理员信息：</td>
						</tr>
						<tr>
							<td width="10%">用户名：</td>
							<td><?php echo $oldInfo['username'];?></td>
						</tr>
						<tr>
							<td>所属部门：</td>
							<td>
								<select name="department_id">
									<option value="-1">必选</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>所属角色：</td>
							<td>
								<select name="role_id">
									<option value="-1">必选</option>
								</select>
							</td>
						</tr>
						<tr>
							<td width="10%">姓名：</td>
							<td><input type="text" name="real_name" value="<?php echo $oldInfo['real_name'];?>"></td>
						</tr>
						<tr>
							<td width="10%">邮箱：</td>
							<td><input type="text" name="mail" value="<?php echo $oldInfo['mail'];?>"></td>
						</tr>
						<tr>
							<td width="10%">电话：</td>
							<td><input type="text" name="phone" value="<?php echo $oldInfo['phone'];?>"></td>
						</tr>
						<tr>
							<td width="10%">是否锁定：</td>
							<td>
								否<input type="checkbox" name="is_lock"     <?php if(0 == $oldInfo['is_lock']){ ?>checked="checked"<?php } ?> >
								是<input type="checkbox" name="is_lock"     <?php if(1 == $oldInfo['is_lock']){ ?>checked="checked"<?php } ?> >
							</td>
						</tr>
						<tr class="btn">
							<input type="hidden" name="id" value="<?php echo $oldInfo['id'];?>">
							<td><input type="submit" value="修改"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</body>
</html>