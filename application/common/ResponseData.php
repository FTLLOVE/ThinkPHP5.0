<?php
/**
 * @fileName ResponseData.php
 * @author sprouts
 * @date 2020/5/20 00:38
 * @description
 */


namespace app\common;


class ResponseData
{

	public static function Success($data = '')
	{
		return [
			"code" => 200,
			"message" => "成功",
			"data" => $data
		];
	}

}