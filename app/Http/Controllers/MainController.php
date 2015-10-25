<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Console\Helper\TableStyle;
use App\MainService;

class MainController extends Controller
{
   
    //添加打印店
   function addPrintShop(){
       
       $validator = Validator::make(Input::all(),[
           'shopname' => 'required',
           'bossname' => 'required',
           'telenum'  => 'required',
           'adnum'    => 'required',
           'money'    => 'required',         
           'cityname' => 'required',
           'key_lat'  => 'required',
           'key_longti'  => 'required',
           'schoolname'  => 'required',
           'shopaddress' => 'required',
           'paydeadline' => 'required',
            
       ]);
       
       //验证未通过
       if ($validator -> fails())
           return response() ->json(['success' => 'false', 'msg' =>$validator -> messages()]);
       
       $service = new MainService();
       $result = $service -> addShop(Input::all());
       
       if ($result)
           return response() ->json(['success' => 'true', 'msg' => '添加成功']);
       else 
           return response() ->json(['success' => 'false', 'msg' => '添加失败']);
            
   }
   
   //更新指定打印店信息
   function updatePrintShop(){

       $validator = Validator::make(Input::all(),[
           'id'       => 'required',
           'shopname' => 'required',
           'bossname' => 'required',
           'telenum'  => 'required',
           'adnum'    => 'required',
           'money'    => 'required',
           'cityname' => 'required',
           'key_lat'  => 'required',
           'key_longti'  => 'required',
           'schoolname'  => 'required',
           'shopaddress' => 'required',
           'paydeadline' => 'required',
       
       ]);
        
       //验证未通过
       if ($validator -> fails())
           return response() ->json(['success' => 'false', 'msg' =>$validator -> messages()]);
        
       $service = new MainService();
       $result = $service -> updateShop(Input::get('id'), Input::all());
        
       if ($result)
           return response() ->json(['success' => 'true', 'msg' => '更新成功']);
       else
           return response() ->json(['success' => 'false', 'msg' => '更新失败']);
   }
   
   //删除指定打印店
   function deletePrintShop(){
       
       $validator = Validator::make(Input::all(), [
           'id' => 'required'
       ]);
       
       if ($validator ->fails())
           return response() -> json(['success' => 'false' ,'msg' => $validator ->messages()]);
       
           
           $service = new MainService();
           $result = $service -> deleteShop(Input::get('id'));
           
           if ($result)
               return response() -> json(['success' => 'true' ,'msg' => '删除成功']);
           else 
               return response() -> json(['success' => 'false' ,'msg' => '删除失败']);
    }

   //根据城市获取学校校区列表
   function getSchoolList(){
       
       $cityName = Input::get('cityname');
       
       if (empty($cityName))
           return response() ->json(['success' => 'false', 'msg' => '城市名为空']);
       
       $service = new MainService();
       $schoolLists = $service ->getSchoolInCity($cityName);
       
       return response() ->json(['success' => 'true', 'msg' => $schoolLists]);
           
   }
   
   //获取指定学校内的打印店信息
   function getPrintShopList(){
       
       $validator = Validator::make(Input::all(), [
           'schoolname' => 'required',
           'page' => 'required | numeric',
           'count' => 'required | numeric'          
       ]);
              
       if ($validator ->fails())
           return response() ->json(['success' => 'false', 'msg' => $validator ->messages()]);
       
       $page = Input::get('page');
       $perPage = Input::get('count');
       $schoolName = Input::get('schoolname');       
       
       $service = new MainService();       
       $schoolList = $service ->getPrintShopInSchool($schoolName, $page, $perPage);
       
       return response() ->json(['success' => 'true', 'msg' => $schoolList]);
   }

   //查看指定打印店的付款记录
   function showPayHistory(){
       
       $printShopId = Input::get('id');
       
       if (empty($printShopId))
           return response() ->json(['success' => 'false', 'msg' => 'id为空']);
       
       $service = new MainService();
       $payHistory = $service ->getPayHistory($printShopId);
       
       return response() ->json(['success' => 'true', 'msg' => $payHistory]);
              
   }

   //付款登记
   function pay(){
       
       $printShopId = Input::get('id');
       
       if(empty($printShopId))
           return response() ->json(['success' => 'false', 'msg' => '付款失败']);
       
       $service = new MainService();
       $payResult = $service -> payRecord($printShopId);
       
       if($payResult)
            return response() ->json(['success' => 'true', 'msg' => '付款成功']);
       else 
           return response() ->json(['success' => 'false', 'msg' => '付款失败']);
            
   }
}

