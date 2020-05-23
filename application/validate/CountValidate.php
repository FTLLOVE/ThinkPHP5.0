<?php
/**
 * @fileName CountValidate.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/22 21:29
 * @description
 */


namespace app\validate;


class CountValidate extends BaseValidate
{

	protected $rule = [
		"count" => "isPositiveInteger|between:1,20"
	];

}