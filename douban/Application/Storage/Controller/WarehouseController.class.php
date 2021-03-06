<?php

/**
* 库房管理控制器
*/
class WarehouseController extends AuthController
{
	private $model = null;

	public function __construct()
	{
		parent::__construct();
		$this->model = K('Warehouse');
	}


	/**
	 * 库房列表
	 */
	public function index()
	{
		$warehouseList = $this->model->getList();
		$this->assign('warehouseList', $warehouseList);
		$this->display();
	}

	/**
	 * 添加
	 */
	public function add()
	{
		$cityList = C('CITY_LIST');
		$this->assign('cityList', $cityList);
		$this->display();
	}


	/**
	 * 操作
	 */
	public function operate()
	{
		$city = (int)Q('post.city_id');
		$name = Q('post.name');
		$address = Q('post.address');
		$manager = Q('post.manager');
		$mobile = (int)Q('post.mobile');

		if (empty($city) || (-1 == $city))
		{
			$this->error('请选择库房所属地区');
		}
		if (empty($name))
		{
			$this->error('库房名称不可为空！');
		}

		$argv = array(
			'name' => $name,
			'address' => $address,
			'manager' => $manager,
			'mobile' => $mobile,
			'city_id' => $city
		);
		if (!isset($_POST['id']))
		{// 添加
			$argv['key_id'] = $this->model->makeKey();
			$this->model->_insert($argv);
			$this->success('添加成功', 'index');
		} else {//编辑
			$id = (int)Q('post.id');
			$this->model->_update($argv, $id);
			$this->success('修改成功', 'index');
		}
	}
}