<?php
/**
 * @fileName CategoryModel.php
 * @author sprouts <1139556759@qq.com>
 * @date 2020/5/22 22:12
 * @description 分类实体对象
 */


namespace app\api\model;


class CategoryModel extends BaseModel
{
	protected $table = "category";

	protected $hidden = ["topic_img_id", "delete_time", "description", "update_time"];


	public function topicImage()
	{
		return $this->belongsTo("ImageModel", "topic_img_id", "id");
	}
}