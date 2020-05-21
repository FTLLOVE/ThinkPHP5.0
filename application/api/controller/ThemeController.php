<?php
/**
 * @fileName ThemeController.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/21 22:05
 * @description theme控制层
 */


namespace app\api\controller;


use app\api\model\ThemeModel;
use app\common\ResponseData;
use app\enum\ScopeEnum;
use app\exception\CustomException;
use app\validate\IdCollectionValidate;
use app\validate\IdValidate;
use think\Request;

class ThemeController
{

	/**
	 * 获取主题列表
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function getThemeList(Request $request)
	{

		$ids = $request->param("ids");

		(new IdCollectionValidate())->goCheck();

		$result = ThemeModel::with(['topImage', 'headImage'])->select($ids);

		if (empty($result)) {
			throw new CustomException(ScopeEnum::LIST_EMPTY);
		}

		return ResponseData::Success($result);
	}


	/**
	 * 获取主题的产品列表
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 */
	public function getProductsOfTheme(Request $request)
	{
		(new IdValidate())->goCheck();
		$res = ThemeModel::getThemeAndProducts($request->param("id"));
		if (empty($res)) {
			throw new CustomException(ScopeEnum::LIST_EMPTY);
		}
		return ResponseData::Success($res);
	}
}