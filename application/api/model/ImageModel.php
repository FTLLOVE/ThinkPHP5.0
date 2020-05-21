<?php
/**
 * @fileName ImageModel.php
 * @author sprouts
 * @email 1139556759@qq.com
 * @date 2020/5/20 23:48
 * @description image实体对象
 */


namespace app\api\model;

class ImageModel extends BaseModel
{

	protected $table = "image";

	protected $hidden = ["id", "delete_time", "update_time", "from"];

	public function getUrlAttr($value, $data)
	{
		return $this->handleImageAttr($value, $data);
	}
}