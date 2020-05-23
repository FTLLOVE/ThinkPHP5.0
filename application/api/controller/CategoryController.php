<?php
/**
 * @fileName CategoryController.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/22 22:13
 * @description 分类控制层
 */


namespace app\api\controller;


use app\api\model\CategoryModel;
use app\api\model\ProductModel;
use app\common\ResponseData;
use app\enum\ScopeEnum;
use app\exception\CustomException;
use app\validate\IdValidate;
use think\Request;

class CategoryController
{

	/**
	 * 获取分类列表
	 *
	 * @return array
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function getCategoryList()
	{
		$result = CategoryModel::with(["topicImage"])->select();
		return ResponseData::Success($result);
	}

	/**
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 */
	public function getProductsByCategoryId(Request $request)
	{
		(new IdValidate())->goCheck();

		$data = ProductModel::getProductsByCategoryId($request->param("id"));
		if ($data->isEmpty()) {
			throw new CustomException(ScopeEnum::LIST_EMPTY);
		}
		$data = $data->hidden(['img_id']);
		return ResponseData::Success($data);
	}


}