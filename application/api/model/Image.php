<?php
/**
 * @fileName Image.php
 * @author sprouts
 * @email 1139556759@qq.com
 * @date 2020/5/20 23:48
 * @description image实体对象
 */


namespace app\api\model;

use think\Model;

class Image extends Model
{
	protected $hidden = ["delete_time", "update_time", "from"];
}