<?php

use App\PrintShopModel;
use App\SchoolModel;
use App\PayHistoryModel;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function(){
    return view('pay');
});

Route::get('/filldata', function () {
    
        //printshopbean表数据
    
//     $jsonData = file_get_contents('datasource/PrintShopBean.json');
//     $objData = json_decode($jsonData, true);
//     $printShopArr = $objData['results'];
    
//     foreach ($printShopArr as $ps){

//         $tableModel = new PrintShopModel();
        
//         $tableModel ->id = $ps ['objectId'];
//         $tableModel ->shopaddress = $ps ['shopaddress'];
//         $tableModel ->shoplatlong = json_encode($ps ['shoplatlong']);
//         $tableModel ->cityname = $ps ['cityname'];
//         $tableModel ->schoolname = $ps ['schoolname'];
//         $tableModel ->shopname = $ps ['shopname'];
//         $tableModel ->bossname = $ps ['bossname'];
//         $tableModel ->telenum = $ps ['telenum'];
//         $tableModel ->adnum = $ps ['adnum'];
//         $tableModel ->money = $ps ['money'];
        
//         date_default_timezone_set('PRC');
//         $tableModel ->paydeadline = date('Y-m-d H:i:s', strtotime($ps['paydeadline']['iso']));
        
//         $tableModel ->save();
//    }

//     //schoolbean数据
//     $jsonData = file_get_contents('datasource/CityBean.json');
//     $objData = json_decode($jsonData, true);
//     $schoolArr = $objData['results'];
    
//     foreach ($schoolArr as $sl){
        
//         $cityname = $sl['cityname'];

//         foreach ($sl['schooljsonarray'] as $key => $value){

//             $tableModel = new SchoolModel();
//             $tableModel -> schoolname = $value;
//             $tableModel -> cityname = $cityname;
            
//             $tableModel -> save();
            
//         }
   
//     }

    //payhistory表数据
    
    $jsonData = file_get_contents('datasource/History.json');
    $objData = json_decode($jsonData, true);
    $payHistoryArr = $objData['results'];
    
    foreach ($payHistoryArr as $ph){
        $payHistory = new PayHistoryModel();
        
        $payHistory ->id = $ph['objectId'];
        $payHistory -> pay_money = $ph['pay_money'];
        
        date_default_timezone_set('PRC');
        $payHistory -> pay_date = date('Y-m-d H:i:s', strtotime($ph['pay_date']['iso']));
        
        $payHistory ->save();
    }
    return 'true';

});

//增加
Route::post('/addPrintShop', "MainController@addPrintShop");

//更新
Route::post('/updatePrintShop', "MainController@updatePrintShop");

//删除
Route::post('/deletePrintShop', "MainController@deletePrintShop");

//获取指定城市内学校列表
Route::post('/getSchoolList', "MainController@getSchoolList");

//获取指定学校的打印店
Route::post('/getPrintList', "MainController@getPrintShopList");

//查看指定打印店付款记录
Route::post('/showPrintHistory', "MainController@showPayHistory");

//付款
Route::post('/pay', "MainController@pay");