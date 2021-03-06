<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统用户管理</title>
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Org/Bootstrap/css/Bootstrap.min.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/public.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/content.css">
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
						<td>电话：</td>
						<td><input type="text" name="phone"></td>
					</tr>
					<tr>
						<td>所属部门：</td>
						<td>
							<select name="department_id">
								<option value="-1">-- 不限 --</option>
								<?php foreach ($deptList as $k=>$v){?>
									<option value="<?php echo $v['id'];?>"><?php echo $v['_name'];?></option>
								<?php }?>
							</select>
						</td>
						<td>所属角色：</td>
						<td>
							<select name="role_id">
								<option value="-1">-- 不限 --</option>
								<?php foreach ($roleList as $k=>$v){?>
									<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
								<?php }?>
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
				<?php foreach ($adminList as $k=>$v){?>
					<tr>
						<td align="center"><?php echo $v['id'];?></td>
						<td align="center"><?php echo $v['username'];?></td>
						<td align="center"><?php echo $v['real_name'];?></td>
						<td align="center"><?php echo $v['mail'];?></td>
						<td align="center"><?php echo $v['phone'];?></td>
						<td align="center"><?php echo $v['dept_name'];?></td>
						<td align="center"><?php echo $v['role_name'];?></td>
						<td align="center">
							    <?php if($v['is_lock']==0){ ?>
								<a href="<?php echo U('Admin/Admin/changeStatus',array('id'=>$v['id']));?>">√</a>
							<?php }else{ ?>
								<a href="<?php echo U('Admin/Admin/changeStatus',array('id'=>$v['id']));?>" style="color:red;">X</a>
							<?php } ?>
						</td>
						<td align="center"><?php echo date('Y-m-d H:i:s',$v['last_login']);?></td>
						<td align="center">
							<a href="<?php echo U('Admin/Admin/edit',array('id'=>$v['id']));?>">编辑</a>
							<a href="<?php echo U('Admin/Admin/del',array('id'=>$v['id']));?>">删除</a>
						</td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</body>
</html>
