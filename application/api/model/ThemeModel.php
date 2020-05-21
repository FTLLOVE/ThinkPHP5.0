<?php
/**
 * @fileName ThemeModel.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/21 22:04
 * @description theme实体对象
 */


namespace app\api\model;


class ThemeModel extends BaseModel
{
	protected $table = "theme";

	protected $hidden = ["topic_img_id", "delete_time", "head_img_id", "update_time"];

	/**
	 * 首页大图
	 * @return \think\model\relation\BelongsTo
	 */
	public function topImage()
	{
		return $this->belongsTo("ImageModel", "topic_img_id", "id");

	}

	/**
	 * 详情大图
	 * @return \think\model\relation\BelongsTo
	 */
	public function headImage()
	{
		return $this->belongsTo("ImageModel", "head_img_id", "id");
	}

	/**
	 * 获取所有主题的产品列表
	 * @return \think\model\relation\BelongsToMany
	 */
	public function products()
	{
		return $this->belongsToMany("ProductModel", "theme_product",
			"product_id", "theme_id");
	}

	public static function getThemeAndProducts($id)
	{
		return self::with(["products", "topImage", "headImage"])->find($id);
	}


}