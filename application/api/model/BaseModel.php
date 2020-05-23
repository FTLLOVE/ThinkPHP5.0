<?php
/**
 * @fileName BaseModel.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/21 22:21
 * @description 基类模型
 */


namespace app\api\model;


use think\Model;

class BaseModel extends Model
{

	public function handleImageAttr($value, $data)
	{
		if ($data['from'] == 1) {
			return config("image_url") . $value;
		} else {
			return $value;
		}
	}
}