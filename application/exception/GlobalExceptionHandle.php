<?php
/**
 * @fileName GlobalExceptionHandle.php
 * @author sprouts
 * @date 2020/5/19 22:04
 */


namespace app\exception;


use Exception;
use think\exception\Handle;
use think\Log;

class GlobalExceptionHandle extends Handle
{

	public function render(Exception $e)
	{
		if ($e instanceof CustomException) {
			$result = [
				"code" => 400,
				"message" => "失败",
				"data" => $e->data
			];
		} else {
			$result = [
				"code" => 500,
				"message" => "服务器内部错误,不想告诉你~~~",
				"data" => ""
			];
			$this->handleLogger($e);
		}
		return json($result);

	}

	/**
	 * 自定义日子记录
	 *
	 * @param Exception $exception
	 */
	private function handleLogger(Exception $exception)
	{
		Log::init([
			"type" => "file",
			"path" => LOG_PATH,
			"level" => ["error"]
		]);
		Log::error($exception->getMessage());
	}


}