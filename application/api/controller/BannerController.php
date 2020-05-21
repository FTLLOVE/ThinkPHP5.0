<?php
/**
 * @fileName BannerController.php
 * @author sprouts
 * @date 2020/5/19 17:48
 */


namespace app\api\controller;

use app\api\model\Banner;
use app\common\ResponseData;
use app\exception\CustomException;
use app\validate\IsPositiveInteger;
use think\Exception;
use think\Request;

class BannerController
{

	/**
	 * 获取banner详情
	 *
	 * @param Request $request
	 * @return mixed
	 * @throws CustomException
	 * @throws Exception
	 */
	public function getBanner(Request $request)
	{

		(new IsPositiveInteger())->goCheck();

//		$mainData = Db::table("banner")
//			->where("id", $request->param("id"))
//			->find();
//		$subdata = Db::table("banner b")
//			->field("bi.*")
//			->join("banner_item bi", "b.id = bi.banner_id", "right")
//			->where("b.id", $request->param("id"))
//			->select();


//		$result = [
//			"mainData" => $mainData,
//			"subData" => $subdata
//		];

		$result = Banner::with(["items", "items.image"])
			->find($request->param("id"));

		return ResponseData::Success($result);

	}


}