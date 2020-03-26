<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// dd(456);

Route::get('/goods', 'IndexController@goods');
// Route::get('/add', function(){
// 	echo '<form action="/adddo" method="post">'.csrf_field().' <input type="text" name="name"><button>提交</button><form>';
// });

// Route::post('/adddo',function(){
// 	echo request()->name;
// }); 

// Route::get('/add', 'IndexController@add');
// Route::post('/adddo', 'IndexController@adddo');


Route::match(['get','post'],'/add','IndexController@add');
// Route::any('/add','IndexController@add');
// Route::view('/add','add');

// Route::get('/show/{id}/{name}', function ($id,$goods_name) {
// 	echo $id .'=='.$goods_name;
// }); 
// 必填参数
Route::get('/show/{id}/{name}','IndexController@show'); 
// 可选参数
// Route::get('/new/{id?}','IndexController@new'); 
// Route::get('/new/{id?}','IndexController@new')->where('id','[0-9]'); 
Route::get('/cate/{id?}/{name?}','IndexController@cate')->where(['id'=>'[0-9]','name'=>'[a-zA-Z]']); 

// 品牌模块增删改查
Route::prefix('brand')->middleware('isLogin')->group(function(){
	Route::get('create','BrandController@create'); 
	Route::post('store','BrandController@store'); 
	Route::get('index','BrandController@index'); 
	Route::get('edit/{id}','BrandController@edit'); 
	Route::post('update/{id}','BrandController@update'); 
	Route::get('destroy/{id}','BrandController@destroy'); 
	Route::get('heihei','BrandController@heihei'); 
});
	

// 学生班级添加展示
Route::get('/student/create','StudentController@create'); 
Route::post('/student/store','StudentController@store'); 
Route::get('/student/index','StudentController@index'); 
Route::get('/student/edit/{id}','StudentController@edit'); 
Route::post('/student/update/{id}','StudentController@update'); 
Route::get('/student/destroy/{id}','StudentController@destroy'); 

// 分类添加
Route::get('/cate/create','CateController@create'); 
Route::post('/cate/store','CateController@store'); 
Route::get('/cate/index','CateController@index'); 

// 房屋添加展示
Route::get('/floor/create','FloorController@create'); 
Route::post('/floor/store','FloorController@store');
Route::get('/floor/index','FloorController@index'); 
 
// 商品
Route::get('/goods/create','GoodsController@create'); 
Route::post('/goods/store','GoodsController@store'); 
Route::get('/goods/index','GoodsController@index'); 
Route::get('/goods/edit/{id}','GoodsController@edit'); 
Route::post('/goods/update/{id}','GoodsController@update'); 
Route::get('/goods/destroy/{id}','GoodsController@destroy'); 

// 图书
Route::get('/book/create','BookController@create'); 
Route::post('/book/store','BookController@store'); 
Route::get('/book/index','BookController@index'); 
Route::get('/book/edit/{id}','BookController@edit'); 
Route::post('/book/update/{id}','BookController@update'); 
Route::get('/book/destroy/{id}','BookController@destroy'); 

// 管理员
Route::get('/admin/create','AdminController@create'); 
Route::post('/admin/store','AdminController@store'); 
Route::get('/admin/index','AdminController@index'); 
Route::get('/admin/edit/{id}','AdminController@edit'); 
Route::post('/admin/update/{id}','AdminController@update'); 
Route::get('/admin/destroy/{id}','AdminController@destroy'); 

// 新闻
Route::get('/news/create','NewsController@create'); 
Route::post('/news/store','NewsController@store'); 
Route::get('/news/index','NewsController@index'); 
Route::get('/news/edit/{id}','NewsController@edit'); 
Route::post('/news/update/{id}','NewsController@update'); 
Route::get('/news/destroy/{id}','NewsController@destroy'); 

// 登录
Route::get('login','LoginController@Login'); 
Route::post('logindo','LoginController@logindo'); 


Route::prefix('article')->middleware('isLogin')->group(function(){
	Route::get('create','ArticleController@create'); 
	Route::post('store','ArticleController@store'); 
	Route::get('index','ArticleController@index'); 
	Route::get('edit/{id}','ArticleController@edit'); 
	Route::post('update/{id}','ArticleController@update'); 
	Route::post('destroy/{id}','ArticleController@destroy'); 
});

Route::get('/','Index\IndexController@index')->name('index'); 
Route::get('/prolist','Index\GoodsController@prolist'); 
Route::get('/denglu','Index\LoginController@denglu'); 
Route::get('/zhuce','Index\LoginController@zhuce'); 
Route::get('/reg/sendSMS','Index\LoginController@sendSMS'); 
Route::any('/doregister','Index\LoginController@doregister'); 
Route::any('/log_do','Index\LoginController@log_do'); 
Route::get('/reg/sendEmail','Index\LoginController@sendEmail'); 
// 商品详情
Route::get('/goods/{id}','Index\GoodsController@index')->name('goods');
Route::post('/addcart','Index\GoodsController@addcart');
// 购物车
Route::get('/cartlist','Index\CartController@cartlist')->name('goods');
// 获取总价
Route::post('/cart/getMoney','Index\CartController@getMoney');
// 确认订单
Route::get('/confirm','Index\CartController@confirm');
// 提交订单
Route::get('/confirmorder','Index\OrderController@confirmorder');
// 新增收货地址
Route::get('/address','Index\OrderController@address');
// 个人中心
Route::get('/wode','Index\WodeController@wode');
// 立即支付
 



// 不知道是啥的登录
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
