<?php /* Smarty version 2.6.26, created on 2015-06-07 19:03:39
         compiled from ../../../Common/header.html */

$this->_cache_serials['/Users/Liyn/Desktop/home/wenda/Index/Temp/Compile//%%5F^5F1^5F14798D%%header.html.inc'] = '7aea798b191e20d8e5eefe9908760c9d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'nocache', '../../../Common/header.html', 22, false),)), $this); ?>
<?php
function _smarty_tplfunc_7aea798b191e20d8e5eefe9908760c9d_0(&$_smarty)
{
$_smarty->_tag_stack[] = array('nocache', array()); $_block_repeat=true;nocache($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], null, $_smarty, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php if (( isset ( $_SESSION['uname'] ) && isset ( $_SESSION['uid'] ) )): ?>
                    <li class='userinfo'>
                        <a href="" class='uname'><?php echo $_SESSION['uname']; ?>
</a>
                    </li>
                    <li style='color:#eaeaf1'>|</li>
                    <li><a href="<?php echo @__APP__; ?>
?c=Index&a=out">退出</a></li> 
                <?php else: ?>
                    <li><a href="" class='login'>登录</a></li>
                    <li style='color:#eaeaf1'>|</li>
                    <li><a href="" class='register'>注册</a></li>	
                <?php endif; ?>
                <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo nocache($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], $_block_content, $_smarty, $_block_repeat); }  array_pop($_smarty->_tag_stack); 
}



?>
