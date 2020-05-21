<?php
/**
 * @fileName CustomException.php 自定义异常基类
 * @author sprouts
 * @date 2020/5/19 22:24
 */


namespace app\exception;

use think\Exception;

class CustomException extends Exception
{
	public $data;

	/**
	 * CustomException constructor.
	 * @param $data
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}


}