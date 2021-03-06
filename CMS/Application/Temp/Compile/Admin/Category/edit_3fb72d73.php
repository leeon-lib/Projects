<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>分类管理</title>
    <script type="text/javascript" src="http://127.0.0.1/Project/CMS/Static/Js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/Project/CMS/Static/hdjs/hdjs.css"/>
    <script src="http://127.0.0.1/Project/CMS/Static/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="http://127.0.0.1/Project/CMS/Static/Bootstrap/css/bootstrap.min.css" />
</head>
<body>
<div class="wrap">
    <div class="hd-title-header">修改分类</div>
    <form action="<?php echo U('Admin/Category/edit');?>" method="post" class="form-inline hd-form">
        <table class="hd-table hd-table-list">
            <tr>
                <th class="w100">分类名称</th>
                <td  class="w100">
                    <input type="text" name="cname" class="w200" value="<?php echo $info['cname'];?>"/> 
                </td>
                <td>分类名称长度 1 到 20 位</td>
            </tr>
            <tr>
                <th class="w100">所属分类</th>
                <td>
                    <select name="pid">
                        <option value="0"     <?php if($info['pid']==0){ ?>selected<?php } ?> >顶级分类</option>
                        <?php foreach ($cateInfo as $k=>$v){?>
                            <?php if(!in_array($v['cid'],$subCateInfo)){ ?>
                            <option value="<?php echo $v['cid'];?>"     <?php if($info['pid']==$v['cid']){ ?>selected<?php } ?> ><?php echo $v['_name'];?></option>
                        <?php } ?>
                        <?php }?>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <th class="w100">分类标题</th>
                <td>
                    <input type="text" name="ctitle" class="w200" value="<?php echo $info['ctitle'];?>"/>
                </td>
                <td> 分类标题长度 1 到 60 位 </td>
            </tr>
            <tr>
                <th class="w100">分类关键字</th>
                <td>
                    <textarea name="ckeywords" id="" class="form-control" rows="5"><?php echo $info['ckeywords'];?></textarea>
                </td>
                <td>分类关键字长度 1 到 255位</td>
            </tr>
            <tr>
                <th class="w100">分类描述</th>
                <td>
                    <textarea name="cdes" id="" class="form-control" rows="5"><?php echo $info['cdes'];?></textarea>
                </td>
                <td>分类描述长度 1 到 255位  </td>
            </tr>
            <tr>
                <th class="w100">分类排序</th>
                <td>
                    <input type="text" name="csort" class="w200" value="<?php echo $info['csort'];?>"/>
                </td>
                <td>请填写1到65535的排序数字 </td>
            </tr>
            <tr>
                <th class="w100">静态目录</th>
                <td>
                    <input type="text" name="htmldir" class="w200" value="<?php echo $info['htmldir'];?>"/>
                </td>
                <td>请填写1~20位只包含字母数字下划线,分类静态目录 例如：php</td>
            </tr>
             <tr>
                <th class="w100">列表页是否静态</th>
                <td>
                    是：<input type="radio" name="is_listhtml" id="" value="1"     <?php if($info['is_listhtml']==1){ ?>checked<?php } ?> />
                    &nbsp;
                    否: <input type="radio" name="is_listhtml" id="" value="0"     <?php if($info['is_listhtml']==0){ ?>checked<?php } ?> />
                </td>
                <td></td>
            </tr>
             <tr>
                <th class="w100">内容页是否静态</th>
                <td>
                    是：<input type="radio" name="is_archtml" id="" value="1"     <?php if($info['is_archtml']==1){ ?>checked<?php } ?> />
                    &nbsp;
                    否: <input type="radio" name="is_archtml" id="" value="0"     <?php if($info['is_archtml']==0){ ?>checked<?php } ?> />
                </td>
                <td></td>
            </tr>
             <tr>
                <th class="w100">是否显示</th>
                <td>
                    是：<input type="radio" name="is_show" id="" value="1"     <?php if($info['is_show']==1){ ?>checked<?php } ?> />
                    &nbsp;
                    否: <input type="radio" name="is_show" id=""  value="0"     <?php if($info['is_show']==0){ ?>checked<?php } ?> />
                </td>
                <td></td>
            </tr>       
        </table>
        <div class="position-bottom">
            <input type="hidden" name="cid" value="<?php echo $hd['get']['cid'];?>" />
            <input type="submit" class="btn btn-warning btn-xs" value="修改"/>
            <input type="button" class="btn btn-success btn-xs" value="返回"/>
        </div>
    </form>
</div>
</body>
</html>