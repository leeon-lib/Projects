<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>CMS</title>
    <hdjs/>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/CMS/Application/Admin/View/Index/LoginStyle/Css/css.css">
    <script type="text/javascript" src="http://127.0.0.1/CMS/Application/Admin/View/Index/LoginStyle/Js/js.js"></script>
</head>
<body>
<div class="header">
    <div class="links">
        <a href="http://www.houdunwang.com">后盾网PHP培训</a> |
        <a href="http://www.hdphp.com">HDCMS</a>
    </div>
</div>
<div class="main">
    <div class="pics">
    </div>
    <div class="login">
        <div class="title">
            后台登录
        </div>
        <div id="tips" class="tips"></div>
        <div class="web_login">
            <div class="login_form">
                <div id="error_tips" class="error_tips">
                    <span id="error_logo" class="error_logo"></span>
                    <span id="err_m" class="err_m">12</span>
                </div>
                <form action="<?php echo U('Admin/Index/Index');?>" method="post" class="form-inline hd-form" autocomplete="on">
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="username" title="帐号" placeholder="用户名" class="empty w300"/>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="password" name="password" placeholder="密码">
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="code" title="验证码" placeholder="验证码" class="empty"/>
                        </div>
                    </div>

                    <div class="verifyimgArea">
                        <img src="<?php echo U('Admin/Index/Code');?>" class="code" style="cursor: pointer;float:left;"
                             onclick=""/>
                        <a href="javascript:void(0);">看不清，换一张</a>
                    </div>
                    <div class="send">
                        <input type="submit" class="btn2" value="登录"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>