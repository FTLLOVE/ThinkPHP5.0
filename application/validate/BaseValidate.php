<?php
/**
 * @fileName BaseValidate.php
 * @author sprouts
 * @date 2020/5/20 00:05
 */


namespace app\validate;


use app\exception\CustomException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{

	protected $rule = [
		"id" => "require|isPositiveInteger",
	];

	protected $message = [
		"id.require" => "id不能为空",
		"id.isPositiveInteger" => "id必须是正整数"
	];

	/**
	 * 校验数字是否是正整数
	 *
	 * @param $value
	 * @param string $rule
	 * @param string $data
	 * @param string $field
	 * @return bool|string
	 */
	protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
	{
		if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
			return true;
		}
		return false;
	}

	public function goCheck()
	{
		$params = Request::instance()->param();

		$result = $this->batch()->check($params);

		if (!$result) {
			throw new CustomException($this->error);
		} else {
			return true;
		}
	}
}