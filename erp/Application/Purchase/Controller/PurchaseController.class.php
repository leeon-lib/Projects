<?php

namespace Purchase\Controller;
use Common\Controller\AuthController;

/**
* 采购管理控制器
*/
class PurchaseController extends AuthController
{
	private $model = null;
	private $warehouseModel = null;
	private $supplierModel = null;
	private $status = array(0=>'正常', 1=>'已锁定');
	private $purchase_status = array(
			0 => '采购中',
			1 => '已到库',
			2 => '部分入库',
			3 => '全部入库',
			4 => '采购完成'
		);

	public function __construct()
	{
		parent::__construct();
		$this->model = D('Purchase');
		$this->supplierModel = D('Supplier');
		$this->warehouseModel = D('Storage/Warehouse');
	}
	/**
	 * 采购单列表
	 */
	public function index()
	{
		// 获取搜索条件
		$purchaseSn = I('post.purchase_sn');
		$saleTypeId = (int)I('post.sale_type_id');
		$supplierId = (int)I('post.supplier_id');
		$warehouseId = (int)I('post.warehouse_id');

		$where = 1;
		if (!empty($purchaseSn))
		{
			$where .= " AND purchase_sn = '{$purchaseSn}' ";
		}
		if ($saleTypeId > 0)
		{
			$where .= " AND sale_type_id = {$saleTypeId}";
		}
		if ($supplierId > 0)
		{
			$where .= " AND supplier_id = {$supplierId}";
		}
		if ($warehouseId > 0)
		{
			$where .= " AND warehouse_id = {$warehouseId}";
		}
		// 获取列表
		$params = [
			'where' => $where
		];
		$purchaseList = $this->model->getList($params);
		foreach ($purchaseList as $key => $value)
		{
			$purchaseList[$key]['supplier_name'] = $this->supplierModel->getOne($value['supplier_id'], 'name', true);
			$purchaseList[$key]['warehouse_name'] = $this->warehouseModel->getOne($value['warehouse_id'], 'name', true);
			$purchaseList[$key]['sale_type_name'] = C('SALE_TYPE')[$value['sale_type_id']];
		}
		// 变量分配
		$this->assign('supplierList', $this->supplierModel->getList());
		$this->assign('warehouseList', $this->warehouseModel->getList());
		$this->assign('saleTypeList', C('SALE_TYPE'));
		$this->assign('purchaseList', $purchaseList);
		$this->display();
	}

	/**
	 * 添加采购单
	 */
	public function add()
	{
		// 公共配置文件中定义的‘销售方式’
		$saleTypeList = C('SALE_TYPE');
		$warehouseList = $this->warehouseModel->getList();
		$supplierList = $this->supplierModel->getList();
		$this->assign('warehouseList', $warehouseList);
		$this->assign('supplierList', $supplierList);
		$this->assign('saleTypeList', $saleTypeList);
		$this->display();
	}


	/**
	 * 添加采购单
	 */
	public function insert()
	{
		// 表单验证
		if (!$this->model->create())
		{
			$this->error($this->model->getError());
		}
		if (4 == $_FILES['csv']['error'])
		{
			$this->error('请提交采购单文件');
		}
		// 获取表单内容
		$supplierId = (int)I('post.supplier_id');
		$warehouseId = (int)I('post.warehouse_id');
		$saleType = (int)I('post.sale_type');
		$expectDate = I('post.expect_date');
		$note = trim(I('post.note'));
		// CSV文件上传，获取内容并验证
		$filePath = C('UPLOAD_PATH');
		$filePath .= $this->upload('Purchase/');
		$csvList = $this->csvGetLines($filePath, 1000, 1);
		if (!$csvList)
		{
			$this->error('文件非法');
		}
		$error = $this->hasError($csvList, 3);
		if ($error)
		{
			die('导入失败！<br /><br />' . $error);
		}
		$product_not_exists = $this->checkNotExists($csvList);
		if ($product_not_exists)
		{
			echo '添加失败！<br /><br />';
			foreach ($product_not_exists as $val)
			{
				header("Content-type:text/html;charset=utf-8;");
				echo '第',$val,'行商品货号不存在<br />';
			}
			die;
		}

		$countNum = 0;
		foreach ($csvList as $v) {
			$countNum += $v[2];
		}
		// 组合主采购表数据
		$argvPP = [
			'purchase_sn' => $this->model->createOrder(),
			'supplier_id' => $supplierId,
			'warehouse_id' => $warehouseId,
			'sale_type' => $saleType,
			'add_date' => date('Y-m-d H:i:s'),
			'expect_date' => $expectDate,
			'note' => $note,
			'num' => $countNum
		];
		// p($argvPP);die;
		$purchase_id = $this->model->doInsert($argvPP);
		// 采购明细表的插入
		$values = '';
		foreach ($csvList as $key => $val) {
			$argv = [
				'purchase_id' => $purchase_id,
				'goods' => $val[0],
				'size' => $val[1],
				'num' => $val[2]
			];
			D('PurchaseProduct')->add($argv);
		}
		$this->success('添加成功', U('index'));
	}

	/**
	 * 采购单明细
	 */
	public function details()
	{
		$goods = trim(I('post.goods'));
		$size = trim(I('post.size'));
		$skuId = (int)I('post.sku_id', -1, 'intval');
		$barCode = trim(I('bar_code'));

		$where = 1;
		if (!empty($goods))
		{
			$where .= " AND goods = '{$goods}'";
		}
		if (!empty($size))
		{
			$where .= " AND size = '{$size}'";
		}
		if ($skuId >= 0)
		{
			$where .= " AND sku_id = {$skuId}";
		}

		$purchaseId = $_GET['id'] ? (int)I('get.id') : (int)I('post.id');
		$where .= " AND purchase_id = {$purchaseId}";
		$purchaseProductModel = D('PurchaseProduct');
		$detailsList = $purchaseProductModel->getList(['where'=>$where]);
		$this->assign('detailsList', $detailsList);
		$this->display();
	}

	
	/**
	 * 采购单冻结操作
	 */
	public function freeze()
	{
		$purchase_id = (int)I('get.id');
		$lock_status = $this->model->getOne($purchase_id, 'lock_status', true);
		if (0 == $lock_status)
		{
			$this->model->doUpdate(['lock_status'=>1], $purchase_id);
		} else {
			$this->model->doUpdate(['lock_status'=>0], $purchase_id);
		}
		$this->success('操作成功', U('index'), 1);
	}

	/**
	 * 下载采购单模板
	 */
	public function downCsv()
	{
		$fileName = C('UPLOAD_PATH') . 'Files/purchase_import.csv';
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=product_import.csv');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($fileName));
		readfile($fileName);
	}

	/**
	 * 检测上传文件的内容
	 * @param  Array   $csvList    [description]
	 * @param  int     $columns [description]
	 * @return boolean          [description]
	 */
	private function hasError(Array $csvList, int $columns)
	{
		$error = '';
		foreach ($csvList as $key => $val)
		{
			$num = count($val);
			if ($num < $columns)
			{
				$error .= '第' . ($key+2) . '行的数据格式出现错误 <br />';
			}
		}
		if ('' != $error)
		{
			return $error;
		} else {
			return false;
		}
	}


	/**
	 * 从指定行数开始，获取指定行数的文件数据
	 * @param  [type]  $filePath [description]
	 * @param  [type]  $lines    [description]
	 * @param  integer $offset   [description]
	 * @return [type]            [description]
	 */
	private function csvGetLines($filePath, $lines, $offset=0)
	{
		$handle = fopen($filePath, 'r');
		if (!$handle)
		{
			return false;
		}

		$i = $j = 0;
		while (true)
		{
			if ($i++ < $offset)
			{
				fgetcsv($handle);
				continue;
			} else {
				break;
			}
		}

		$list = array();
		$n = 0;
		while ($j++ < $lines && !feof($handle))
		{
			$data = fgetcsv($handle);
			$num = count($data);
			for ($i=0; $i < $num; $i++)
			{ 
				if (!empty($data[$i]))
				{
					$list[$n][] = $data[$i];
				}
			}
			$n++;
		}
		fclose($handle);
		return $list;
	}

	/**
	 * 字符串转码
	 *
	 * @param mixed $var
	 */
	private function encoding($var)
	{
		if(is_string($var))
		{
			return iconv('gbk', 'utf-8', $var);
		}
		if(is_array($var))
		{
			foreach($var as $i => $v)
			{
				if(is_string($v))
				{
					$var[$i] = iconv('gbk', 'utf-8', $v);
				} else {
					$var[$i] = self::encoding($v);
				}
			}
			return $var;
		}
	}

	/**
	 * 文件上传
	 * @param  string	项目附属目录下的子目录 
	 * @return string   上传后的文件信息
	 */
	private function upload($path, $thumb=false)
	{
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'csv');// 设置附件上传类型

		$upload->rootPath = C('UPLOAD_PATH');
		$upload->savePath = $path;
		// 上传文件
		$info = current($upload->upload());
		if(!$info) 
		{// 上传错误提示错误信息
			die($upload->getError());
		} else {// 上传成功
			$savePath = $info['savepath'] . $info['savename'];
			// 是否缩略
			if (!$thumb)
			{
				return $savePath;
			} else {
				$image = new \Think\Image();
				$path = C('UPLOAD_PATH') . $savePath;
				$image->open($path);
				$image->thumb(C('THUMB_W'), C('THUMB_W'), \Think\Image::IMAGE_THUMB_FIXED)->save($path);
				return $savePath;
			}
		}
	}

	
	/**
	 * 检测CSV文件中的商品是否存在
	 * @param  Array  $csvList [description]
	 * @return [type]          [description]
	 */
	private function checkNotExists(Array $csvList)
	{
		$productModel = D('Product/Product');
		$goodsList = $productModel->getField('goods', true);
		$errorRows = array();
		foreach ($csvList as $key => $val)
		{
			$goods = $val[0];
			if (!in_array($goods, $goodsList))
			{
				$errorRows[] = $key+2;
			}
		}
		if (empty($errorRows))
		{
			return false;
		} else {
			return $errorRows;
		}
	}




}
