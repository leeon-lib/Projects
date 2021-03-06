<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加属性</title>
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Org/Bootstrap/css/Bootstrap.min.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/public.css">
	<link rel="stylesheet" href="http://127.0.0.1/Project/douban/Static/Css/content.css">
<body>
	<div class="warp">
		<div class="submenu">
			<div class="left">
				<a href="<?php echo U('Product/Attribute/index');?>">属性列表</a>
				<span>|</span>
				<a href="<?php echo U('Product/Attribute/add');?>">添加属性</a>
			</div>
			<div class="right">
				<a href="">后退</a>
				<span>|</span>
				<a href="">刷新</a>
			</div>
		</div>
		<div class="content">
			<form action="<?php echo U('add');?>" method="post">
				<table class="content-table">
					<tbody>
						<tr class="title">
							<td colspan="10">直接录入：</td>
						</tr>
						<tr>
							<td width="10%">属性名称：</td>
							<td><input type="text" name="name"></td>
							<td width="65%"></td>
						</tr>
						<tr>
							<td>属性值：</td>
							<td><textarea name="value" cols="30" rows="10"></textarea></td>
							<td>支持以中、英文逗号或'|'隔开</td>
						</tr>
						<tr>
							<td>类别：</td>
							<td>
								<label>属性：<input type="radio" name="kind_id" value="1" checked="checked"></label>
								<label>规格：<input type="radio" name="kind_id" value="2"></label>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>检索字母：</td>
							<td><input type="text" name="key_char"></td>
							<td>建议填写属性首字母，以便于列表检索</td>
						</tr>
						<tr class="btn">
							<td><input type="submit" value="添加"></td>
						</tr>
					</tbody>
				</table>
			</form>
			<form action="<?php echo U('Product/Attribute/implode');?>" method="post">
				<table class="content-table">
					<tbody>
						<tr class="title">
							<td colspan="10">表格导入：</td>
						</tr>
						<tr>
							<td width="10%">文件：</td>
							<td><input type="file"></td>
						</tr>
						<tr class="note">
							<td>备注：</td>
							<td>只允许csv的文件格式。</td>
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