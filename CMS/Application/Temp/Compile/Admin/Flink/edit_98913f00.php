<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>标签管理</title>
    <script type="text/javascript" src="http://127.0.0.1/CMS/Static/Js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/CMS/Static/hdjs/hdjs.css"/>
    <script src="http://127.0.0.1/CMS/Static/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="http://127.0.0.1/CMS/Static/Bootstrap/css/bootstrap.min.css" />
</head>
<body>
    <div class="wrap">
        <div class="hd-title-header">编辑</div>
        <form action="<?php echo U('Admin/Flink/edit');?>" method="post" class="" enctype="multipart/form-data">
            <table class="hd-table hd-table-form hd-form">
                <tbody>
                    <tr>
                        <th width="100">链接名称</th>
                        <td>
                            <input type="text" name="fname" value="<?php echo $oldData['fname'];?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>排序</th>
                        <td>
                            <input type="text" name="sort" value="<?php echo $oldData['sort'];?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Logo</th>
                        <td>
                            <img src="http://127.0.0.1/CMS/<?php echo $oldData['logo'];?>" alt="" />
                            <input type="hidden" name="logo" value="<?php echo $oldData['logo'];?>" />
                            <span class="close">X</span>
                        </td>
                    </tr>
                    <tr>
                        <th>描述</th>
                        <td>
                            <textarea name="msg" class="hd-w500 hd-h280"><?php echo $oldData['msg'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>链接地址</th>
                        <td>
                            <input type="text" name="url" value="<?php echo $oldData['url'];?>">
                        </td>
                    </tr>
                    <tr>
                        <th>是否显示</th>
                        <td>
                            <label><input name="is_show" value="1" type="radio" checked> 显示</label>
                            <label><input name="is_show" value="0" type="radio"> 隐藏</label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="fid" value="<?php echo $oldData['fid'];?>" />
            <input type="submit" class="hd-btn hd-btn-success" value="修改" style="margin-top:20px;margin-left:20px;"/>
        </form>
    </div>
</body>
<script type="text/javascript">
    $('.close').click(function(){
        $(this).siblings('img').hide().parent('td').html("<input type='file' name='logo'>");
    })
</script>
</html>