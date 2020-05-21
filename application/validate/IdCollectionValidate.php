<?php
/**
 * @fileName IdCollectionValidate.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/22 00:26
 * @description
 */


namespace app\validate;


class IdCollectionValidate extends BaseValidate
{

	protected $rule = [
		"ids" => "require|checkIds"
	];

	protected $message = [
		"ids.require" => "ids不能为空",
		"ids.checkIds" => "ids必须都为正整数"
	];

	protected function checkIds($ids)
	{
		$value = explode(",", $ids);
		if (empty($value)) {
			return false;
		}

		foreach ($value as $val) {
			if (!$this->isPositiveInteger($val)) {
				return false;
			}
		}
		return true;
	}
}