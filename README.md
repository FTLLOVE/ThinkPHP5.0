public function goCheck()
       	{
       		$params = Request::instance()->param();
       
       		$result = $this->check($params);
       
       		if (!$result) {
       			$error = $this->error;
       			throw new Exception($error);
       		} else {
       			return true;
       		}
       	}
       	
       	
       	class IsPositiveInteger extends BaseValidate
        {
        
        	protected $rule = [
        		"id" => "require|isPositiveInteger",
        		"name" => "in:1,2,3",
        		"phone" => "require|max:11|/^1[3-8]{1}[0-9]{9}$/"
        	];
        
        	protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
        	{
        		if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
        			return true;
        		} else {
        			return "$field 必须是正整数";
        		}
        
        	}
        }
        
       今日工作:
        1. 核对完成净价格测算等额分期保险费计算
        2. 核对完成净价格测算等额分期转灵活贷价计算
        3. 净价格测算上商务条件新增，详情页面新增旧机产品名称
        4. 订货确认表新增，详情，编辑旧机产品名称

        