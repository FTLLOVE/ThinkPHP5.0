<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


use think\Route;

// 自定义控制层

// 获取banner详情
Route::any("api/v1/getBanner", "api/BannerController/getBanner");
// 新增banner
Route::any("api/v1/addBanner", "api/BannerController/addBanner");
// 更新banner
Route::any("api/v1/updateBanner", "api/BannerController/updateBanner");
// 获取banner列表
Route::any("api/v1/getBannerList", "api/BannerController/getBannerList");

// 获取theme列表
Route::any("api/v1/getThemeList", "api/ThemeController/getThemeList");
// 获取theme的产品列表
Route::any("api/v1/getProductsOfTheme", "api/ThemeController/getProductsOfTheme");

// 最新商品
Route::any("api/v1/getNewProductList", "api/ProductController/getNewProductList");

// 分类
Route::any("api/v1/getCategoryList", "api/CategoryController/getCategoryList");
// 获取分类下的产品列表
Route::any("api/v1/getProductsByCategoryId", "api/CategoryController/getProductsByCategoryId");


