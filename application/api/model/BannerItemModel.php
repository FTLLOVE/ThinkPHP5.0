<?php
/**
 * @fileName BannerItemModel.php
 * @author sprouts
 * @email 1139556759@qq.com
 * @date 2020/5/20 23:03
 * @description bannerItem实体对象
 */


namespace app\api\model;


class BannerItemModel extends BaseModel
{

	protected $table = "banner_item";

	protected $visible = ["banner_id", "image"];

	/**
	 *
	 *
	 * @return \think\model\relation\BelongsTo
	 */
	public function image()
	{
		return $this->belongsTo("ImageModel", "img_id", "id");
	}
}