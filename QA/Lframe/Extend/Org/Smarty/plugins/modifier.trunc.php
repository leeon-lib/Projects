<?php

function smarty_modifier_trunc($string, $len=20,$etc='...')
{
	//按照utf-8编码形式截取，mb_substr截取汉字和英文都没有问题
	return mb_substr($string, 0,$len,'utf-8') . $etc;
}


?>
