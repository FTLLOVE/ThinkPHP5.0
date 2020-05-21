<?php
/**
 * @fileName BannerModel.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/20 21:45
 * @description banner实体对象
 */


namespace app\api\model;

use think\model;

class BannerModel extends BaseModel
{
	protected $table = "banner";

	protected $hidden = ["delete_time", "update_time"];

	/**
	 *
	 * @return model\relation\HasMany
	 */
	public function items()
	{
		return $this->hasMany("BannerItemModel", "banner_id", "id");
	}

}