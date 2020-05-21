<?php
/**
 * @fileName IdValidate.php
 * @author sprouts
 * @date 2020/5/20 00:08
 */


namespace app\validate;


class IdValidate extends BaseValidate
{

	protected $rule = [
		"id" => "require|isPositiveInteger",
	];

	protected $message = [
		"id.require" => "id不能为空",
		"id.isPositiveInteger" => "id必须是正整数"
	];

	protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
	{
		return parent::isPositiveInteger($value, $rule, $data, $field);
	}

	/**
	 * 校验手机号的合法性
	 *
	 * @param $value
	 * @param string $rule
	 * @param string $data
	 * @return bool|string
	 */
	protected function isPhone($value, $rule = '', $data = '')
	{
		if (preg_match('/^1[34578]{1}\d{9}$/', $value)) {
			return true;
		}
		return "手机号不合法";
	}


}