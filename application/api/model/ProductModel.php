<?php
/**
 * @fileName ProductModel.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/21 22:04
 * @description product实体对象
 */


namespace app\api\model;


use think\Request;

class ProductModel extends BaseModel
{

	protected $table = "product";

	protected $hidden = ["delete_time", "from", "create_time", "update_time", "pivot", "category_id"];

	protected function getMainImgUrlAttr($value, $data)
	{
		return $this->handleImageAttr($value, $data);
	}

	public static function getProductList(Request $request, $count)
	{
		$product = new ProductModel();
		return $product
			->where("name", "like", "%" . $request->param("name") . "%")
			->limit(0, $count)
			->order("create_time", "desc")
			->select();

	}

	/**
	 * 获取产品列表
	 *
	 * @param $categoryId
	 * @return bool|false|\PDOStatement|string|\think\Collection
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public static function getProductsByCategoryId($categoryId)
	{
		$product = new ProductModel();
		return $product
			->where("category_id", "=", $categoryId)
			->select();
	}

}