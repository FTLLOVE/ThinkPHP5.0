<?php
/**
 * @fileName ProductController.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/22 21:12
 * @description 最新商品控制层
 */


namespace app\api\controller;


use app\api\model\ProductModel;
use app\common\ResponseData;
use app\enum\ScopeEnum;
use app\exception\CustomException;
use app\validate\CountValidate;
use think\Request;

class ProductController
{

	/**
	 * 获取最新商品列表
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 */
	public function getNewProductList(Request $request)
	{
		(new CountValidate())->goCheck();

		$data = ProductModel::getProductList(
			$request,
			$request->param("count")
		);

		if ($data->isEmpty()) {
			throw new CustomException(ScopeEnum::LIST_EMPTY);
		}

		$data = $data->hidden(['summary', 'img_id']);

		$result = [
			"count" => count($data),
			"products" => $data
		];

		return ResponseData::Success($result);
	}
}