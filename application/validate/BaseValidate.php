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