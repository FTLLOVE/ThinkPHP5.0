<?php
/**
 * @fileName IsPositiveInteger.php
 * @author sprouts
 * @date 2020/5/20 00:08
 */


namespace app\validate;


class IsPositiveInteger extends BaseValidate
{

	protected $rule = [
		"id" => "require|isPositiveInteger",
//		"telephone" => "require|length:11|isPhone"
	];

	protected $message = [
		"id.require" => "id不能为空",
//		"telephone.leng/*th" => "手机号长度是11位",
//		"telephone.requ*/ire" => "手机号不能为空"
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
		return "id必须是正整数";
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