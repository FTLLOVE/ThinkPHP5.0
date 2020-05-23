<?php
/**
 * @fileName ThemeController.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/21 22:05
 * @description banner控制层
 */

namespace app\api\controller;

use app\api\model\BannerModel;
use app\common\ResponseData;
use app\enum\ScopeEnum;
use app\exception\CustomException;
use app\validate\BannerValidate;
use app\validate\IdValidate;
use think\Request;

class BannerController
{

	/**
	 * 获取banner详情
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function getBanner(Request $request)
	{

		(new IdValidate())->goCheck();

		$result = BannerModel::with(["items", "items.image"])
			->find($request->param("id"));

		return ResponseData::Success($result);

	}

	/**
	 * 新增banner
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function addBanner(Request $request)
	{
		(new BannerValidate())->goCheck();


		$originBanner = BannerModel::where("name", $request->param("name"))
			->find();

		if (!is_null($originBanner)) {
			throw new CustomException(ScopeEnum::BANNER_IS_EXIST);
		}

		$originBanner = new BannerModel([
			"name" => $request->param("name"),
			"description" => $request->param("description"),
			"update_time" => time(),
		]);


		$originBanner->save();

		return ResponseData::Success();
	}

	/**
	 * 更新banner
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 * @throws \think\exception\DbException
	 */
	public function updateBanner(Request $request)
	{

		(new IdValidate())->goCheck();
		(new BannerValidate())->goCheck();

		$originBanner = BannerModel::get($request->param("id"));
		if (is_null($originBanner)) {
			throw new CustomException(ScopeEnum::BANNER_NOT_EXIST);
		}

		BannerModel::where("id", $request->param("id"))
			->update(
				[
					'name' => $request->param("name"),
					'description' => $request->param("description"),
					'update_time' => time(),
				]
			);

		return ResponseData::Success();
	}

	/**
	 * 获取banner列表（支持name和description搜索）
	 *
	 * @param Request $request
	 * @return array
	 * @throws CustomException
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function getBannerList(Request $request)
	{
		$keyword = $request->param("keyword");
		$bannerModel = new BannerModel();
		$result = $bannerModel->where("name", "like", "%$keyword%")
			->whereOr("description", "like", "%$keyword%")
			->select();
		if ($result->isEmpty()) {
			throw new CustomException(ScopeEnum::LIST_EMPTY);
		}
		return ResponseData::Success($result);
	}

}