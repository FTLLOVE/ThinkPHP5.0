<?php
/**
 * @fileName BannerItem.php
 * @author sprouts
 * @email 1139556759@qq.com
 * @date 2020/5/20 23:03
 * @description bannerItem实体对象
 */


namespace app\api\model;


use think\Model;

class BannerItem extends Model
{

	protected $visible = ["key_word", "banner_id", "image"];

	/**
	 *
	 *
	 * @return \think\model\relation\BelongsTo
	 */
	public function image()
	{
		return $this->belongsTo("Image", "img_id", "id");
	}
}