<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统用户管理</title>
	<link rel="stylesheet" href="/Project/erp/web/Public/Org/Bootstrap/css/Bootstrap.min.css">
	<link rel="stylesheet" href="/Project/erp/web/Public/Css/public.css">
	<link rel="stylesheet" href="/Project/erp/web/Public/Css/content.css">
</head>
<body>
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
		<div class="search">
			<form action="<?php echo U('Admin/Admin/index');?>" method="post">
				<table class="search-table">
					<tr>
						<td width="8%">管理员ID：</td>
						<td width="40%"><input type="text" name="admin_id"></td>
						<td width="8%">用户名：</td>
						<td width="40%"><input type="text" name="username"></td>
					</tr>
					<tr>
						<td>真实姓名：</td>
						<td><input type="text" name="real_name"></td>
						<td>手机号：</td>
						<td><input type="text" name="phone"></td>
					</tr>
					<tr>
						<td>所属部门：</td>
						<td>
							<select name="department_id">
								<option value="-1">-- 不限 --</option>
								<?php if(is_array($deptList)): foreach($deptList as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</td>
						<td>所属角色：</td>
						<td>
							<select name="role_id">
								<option value="-1">-- 不限 --</option>
								<?php if(is_array($roleList)): foreach($roleList as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</td>	
					</tr>
					<tr><td><input type="submit" value="搜索"></td></tr>
				</table>
			</form>
		</div>
		<table class="content-table">
			<thead>
				<tr>
					<td width="5%" align="center">用户ID</td>
					<td width="10%" align="center">用户名</td>
					<td width="10%" align="center">真实姓名</td>
					<td width="10%" align="center">邮箱</td>
					<td width="10%" align="center">手机号</td>
					<td width="10%" align="center">所属部门</td>
					<td width="10%" align="center">所属角色</td>
					<td width="8%" align="center">状态</td>
					<td width="10%" align="center">上次登录时间</td>
					<td width="10%" align="center">管理操作</td>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($adminList)): foreach($adminList as $key=>$v): ?><tr>
						<td align="center"><?php echo ($v["id"]); ?></td>
						<td align="center"><?php echo ($v["username"]); ?></td>
						<td align="center"><?php echo ($v["real_name"]); ?></td>
						<td align="center"><?php echo ($v["mail"]); ?></td>
						<td align="center"><?php echo ($v["phone"]); ?></td>
						<td align="center"><?php echo ($v["dept_name"]); ?></td>
						<td align="center"><?php echo ($v["role_name"]); ?></td>
						<td align="center">
							<a href="<?php echo U('Admin/Admin/changeStatus',array('id'=>$v['id']));?>">
								<?php if(($v['is_lock']) == "0"): ?><i class="glyphicon glyphicon-ok"></i>
								<?php else: ?>
									<i style="color:red;" class="glyphicon glyphicon-remove"></i><?php endif; ?>
							</a>						</td>
						<td align="center">
							<?php if(($v["last_login"]) != "0"): echo (date('Y-m-d H:i:s',$v["last_login"])); ?>
							<?php else: ?>
								－－－<?php endif; ?>
						</td>
						<td align="center">
							<a href="<?php echo U('Admin/Admin/edit',array('id'=>$v['id']));?>">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<a href="<?php echo U('Admin/Admin/del',array('id'=>$v['id']));?>">
								<i class="glyphicon glyphicon-trash"></i>
							</a>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</body>
</html>