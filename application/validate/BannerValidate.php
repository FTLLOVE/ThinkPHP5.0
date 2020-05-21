<?php
/**
 * @fileName BannerValidate.php
 * @author sprouts
 * @email 1139556759@qq.com
 * @date 2020/5/20 15:39
 * @description
 */


namespace app\validate;


class BannerValidate extends BaseValidate
{

	protected $rule = [
		"name" => "require",
		"description" => "require",
	];

	protected $message = [
		"name.require" => "名称不能为空",
		"description" => "描述不能为空",
	];
}