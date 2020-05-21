<?php
/**
 * @fileName ProductModel.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/21 22:04
 * @description product实体对象
 */


namespace app\api\model;


class ProductModel extends BaseModel
{

	protected $table = "product";

	protected $hidden = ["delete_time", "from", "create_time", "update_time", "pivot", "category_id"];

	protected function getMainImgUrlAttr($value, $data)
	{
		return $this->handleImageAttr($value, $data);
	}
}